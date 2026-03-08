const fs = require("fs");
const path = require("path");
const sqlite3 = require("sqlite3").verbose();
const bcrypt = require("bcryptjs");

const dbDir = path.join(__dirname, "..", "data");
const dbPath = path.join(dbDir, "app.db");

let db;

const run = (sql, params = []) =>
  new Promise((resolve, reject) => {
    db.run(sql, params, function onRun(err) {
      if (err) return reject(err);
      return resolve(this);
    });
  });

const get = (sql, params = []) =>
  new Promise((resolve, reject) => {
    db.get(sql, params, (err, row) => {
      if (err) return reject(err);
      return resolve(row);
    });
  });

const nowIso = () => new Date().toISOString();

const addMinutes = (isoDateString, minutes) => {
  const date = new Date(isoDateString);
  date.setMinutes(date.getMinutes() + minutes);
  return date.toISOString();
};

const openDatabase = () =>
  new Promise((resolve, reject) => {
    db = new sqlite3.Database(dbPath, (err) => {
      if (err) return reject(err);
      return resolve();
    });
  });

const initDatabase = async () => {
  fs.mkdirSync(dbDir, { recursive: true });
  await openDatabase();

  await run(`
    CREATE TABLE IF NOT EXISTS admins (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      username TEXT NOT NULL UNIQUE,
      password_hash TEXT NOT NULL,
      created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
    )
  `);

  await run(`
    CREATE TABLE IF NOT EXISTS login_rate_limits (
      ip_address TEXT PRIMARY KEY,
      failed_attempts INTEGER NOT NULL DEFAULT 0,
      window_started_at TEXT,
      blocked_until TEXT,
      last_attempt_at TEXT,
      created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
      updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
    )
  `);

  const adminUsername = process.env.ADMIN_USERNAME || "admin";
  const adminPassword = process.env.ADMIN_PASSWORD || "";

  const existingAdmin = await get(
    "SELECT id FROM admins WHERE username = ?",
    [adminUsername],
  );

  if (!existingAdmin && !adminPassword) {
    throw new Error(
      "ADMIN_PASSWORD hianyzik: nincs admin felhasznalo az adatbazisban.",
    );
  }

  if (!existingAdmin && adminPassword) {
    const passwordHash = adminPassword.startsWith("$2")
      ? adminPassword
      : await bcrypt.hash(adminPassword, 12);

    await run("INSERT INTO admins (username, password_hash) VALUES (?, ?)", [
      adminUsername,
      passwordHash,
    ]);
  }
};

const findAdminByUsername = (username) =>
  get("SELECT id, username, password_hash FROM admins WHERE username = ?", [
    username,
  ]);

const getRateLimitByIp = (ipAddress) =>
  get("SELECT * FROM login_rate_limits WHERE ip_address = ?", [ipAddress]);

const isIpBlocked = async (ipAddress) => {
  const row = await getRateLimitByIp(ipAddress);
  if (!row || !row.blocked_until) {
    return { blocked: false, blockedUntil: null };
  }

  const blockedUntil = new Date(row.blocked_until);
  if (Number.isNaN(blockedUntil.getTime())) {
    return { blocked: false, blockedUntil: null };
  }

  if (blockedUntil > new Date()) {
    return { blocked: true, blockedUntil: blockedUntil.toISOString() };
  }

  return { blocked: false, blockedUntil: null };
};

const registerFailedLoginAttempt = async (
  ipAddress,
  { maxAttempts, windowMinutes, blockMinutes },
) => {
  const now = nowIso();
  const row = await getRateLimitByIp(ipAddress);

  let failedAttempts = 1;
  let windowStartedAt = now;

  if (row && row.window_started_at) {
    const windowStart = new Date(row.window_started_at);
    const windowExpiredAt = addMinutes(row.window_started_at, windowMinutes);

    if (!Number.isNaN(windowStart.getTime()) && new Date(windowExpiredAt) > new Date(now)) {
      failedAttempts = row.failed_attempts + 1;
      windowStartedAt = row.window_started_at;
    }
  }

  const shouldBlock = failedAttempts >= maxAttempts;
  const blockedUntil = shouldBlock ? addMinutes(now, blockMinutes) : null;

  await run(
    `
      INSERT INTO login_rate_limits (
        ip_address,
        failed_attempts,
        window_started_at,
        blocked_until,
        last_attempt_at,
        updated_at
      )
      VALUES (?, ?, ?, ?, ?, ?)
      ON CONFLICT(ip_address) DO UPDATE SET
        failed_attempts = excluded.failed_attempts,
        window_started_at = excluded.window_started_at,
        blocked_until = excluded.blocked_until,
        last_attempt_at = excluded.last_attempt_at,
        updated_at = excluded.updated_at
    `,
    [ipAddress, failedAttempts, windowStartedAt, blockedUntil, now, now],
  );

  return {
    blocked: shouldBlock,
    blockedUntil,
    failedAttempts,
  };
};

const resetFailedLoginAttempts = async (ipAddress) => {
  const now = nowIso();
  await run(
    `
      UPDATE login_rate_limits
      SET failed_attempts = 0,
          window_started_at = NULL,
          last_attempt_at = ?,
          updated_at = ?
      WHERE ip_address = ?
    `,
    [now, now, ipAddress],
  );
};

module.exports = {
  initDatabase,
  findAdminByUsername,
  isIpBlocked,
  registerFailedLoginAttempt,
  resetFailedLoginAttempts,
};
