const express = require("express");
const bcrypt = require("bcryptjs");
const { body } = require("express-validator");
const { validate } = require("../middleware/validation");
const {
  findAdminByUsername,
  isIpBlocked,
  registerFailedLoginAttempt,
  resetFailedLoginAttempts,
} = require("../lib/database");
const router = express.Router();
const MAX_LOGIN_ATTEMPTS = Number(process.env.MAX_LOGIN_ATTEMPTS || 5);
const LOGIN_WINDOW_MINUTES = Number(process.env.LOGIN_WINDOW_MINUTES || 15);
const LOGIN_BLOCK_MINUTES = Number(process.env.LOGIN_BLOCK_MINUTES || 15);
const TOO_MANY_ATTEMPTS_MESSAGE = "Tul sok hibas probalkozas. Probald ujra kesobb.";
const INVALID_CREDENTIALS_MESSAGE = "Hibas felhasznalonev vagy jelszo.";

const loginValidationRules = [
  body("username")
    .isString()
    .trim()
    .isLength({ min: 3, max: 64 }),
  body("password")
    .isString()
    .isLength({ min: 1, max: 128 }),
];

const getClientIp = (req) => {
  const forwarded = req.headers["x-forwarded-for"];
  const fromForwarded = Array.isArray(forwarded)
    ? forwarded[0]
    : typeof forwarded === "string"
      ? forwarded.split(",")[0]
      : null;

  const rawIp = (fromForwarded || req.ip || req.socket?.remoteAddress || "unknown").trim();
  return rawIp.replace(/^::ffff:/, "");
};

// Middleware: Ellenőrzi, hogy be van-e lépve a felhasználó
const isAdmin = (req, res, next) => {
  if (req.session && req.session.isLoggedIn) {
    next();
  } else {
    res.redirect("/admin/login");
  }
};

router.get("/login", (req, res) => {
  if (req.session && req.session.isLoggedIn) {
    return res.redirect("/admin/dashboard");
  }

  return res.render("admin/login", { error: null });
});

router.post(
  "/login",
  validate(loginValidationRules, (req, res) =>
    res.status(400).render("admin/login", {
      error: "Hibas bemenet. Ellenorizd az adatokat.",
    }),
  ),
  async (req, res) => {
  const username = (req.body.username || "").trim();
  const password = req.body.password || "";
  const clientIp = getClientIp(req);

  try {
    const blockState = await isIpBlocked(clientIp);
    if (blockState.blocked) {
      return res.status(429).render("admin/login", {
        error: TOO_MANY_ATTEMPTS_MESSAGE,
      });
    }

    const admin = await findAdminByUsername(username);
    if (!admin) {
      const failState = await registerFailedLoginAttempt(clientIp, {
        maxAttempts: MAX_LOGIN_ATTEMPTS,
        windowMinutes: LOGIN_WINDOW_MINUTES,
        blockMinutes: LOGIN_BLOCK_MINUTES,
      });

      return res.status(failState.blocked ? 429 : 401).render("admin/login", {
        error: failState.blocked
          ? TOO_MANY_ATTEMPTS_MESSAGE
          : INVALID_CREDENTIALS_MESSAGE,
      });
    }

    const passwordValid = await bcrypt.compare(password, admin.password_hash);
    if (!passwordValid) {
      const failState = await registerFailedLoginAttempt(clientIp, {
        maxAttempts: MAX_LOGIN_ATTEMPTS,
        windowMinutes: LOGIN_WINDOW_MINUTES,
        blockMinutes: LOGIN_BLOCK_MINUTES,
      });

      return res.status(failState.blocked ? 429 : 401).render("admin/login", {
        error: failState.blocked
          ? TOO_MANY_ATTEMPTS_MESSAGE
          : INVALID_CREDENTIALS_MESSAGE,
      });
    }

    await resetFailedLoginAttempts(clientIp);
    return req.session.regenerate((err) => {
      if (err) {
        return res.status(500).render("admin/login", {
          error: "Szerver hiba tortent.",
        });
      }

      req.session.isLoggedIn = true;
      req.session.adminUsername = admin.username;
      return res.redirect("/admin/dashboard");
    });
  } catch (err) {
    return res.status(500).render("admin/login", {
      error: "Szerver hiba tortent.",
    });
  }
});

router.post("/logout", isAdmin, (req, res) => {
  req.session.destroy(() => {
    res.redirect("/admin/login");
  });
});

// Admin főoldal (Védett!)
router.get("/dashboard", isAdmin, (req, res) => {
  res.render("admin/dashboard", {
    username: req.session.adminUsername || "admin",
  });
});

// Itt jöhetnek majd az újabb modulok:
// router.use('/termekek', require('./admin/products'));

module.exports = router;
