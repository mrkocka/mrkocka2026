const crypto = require("crypto");

const SAFE_METHODS = new Set(["GET", "HEAD", "OPTIONS"]);

const ensureCsrfToken = (req) => {
  if (!req.session) {
    throw new Error("Session middleware szukseges a CSRF vedelemhez.");
  }

  if (!req.session.csrfToken) {
    req.session.csrfToken = crypto.randomBytes(32).toString("hex");
  }

  return req.session.csrfToken;
};

const tokensMatch = (a, b) => {
  if (!a || !b) return false;

  const aBuffer = Buffer.from(a);
  const bBuffer = Buffer.from(b);

  if (aBuffer.length !== bBuffer.length) return false;

  return crypto.timingSafeEqual(aBuffer, bBuffer);
};

const csrfProtection = (req, res, next) => {
  try {
    const sessionToken = ensureCsrfToken(req);
    res.locals.csrfToken = sessionToken;

    if (SAFE_METHODS.has(req.method)) {
      return next();
    }

    const requestToken =
      req.body?._csrf || req.get("x-csrf-token") || req.get("csrf-token");

    if (!tokensMatch(sessionToken, requestToken)) {
      if (req.accepts("json")) {
        return res.status(403).json({ error: "Invalid CSRF token" });
      }

      return res.status(403).send("Forbidden (CSRF token invalid)");
    }

    return next();
  } catch (err) {
    return next(err);
  }
};

module.exports = {
  csrfProtection,
};
