const express = require("express");
const router = express.Router();

// Middleware: Ellenőrzi, hogy be van-e lépve a felhasználó
const isAdmin = (req, res, next) => {
  if (req.session.isLoggedIn) {
    next();
  } else {
    res.redirect("/admin/login");
  }
};

// Admin főoldal (Védett!)
router.get("/dashboard", isAdmin, (req, res) => {
  res.render("admin/dashboard");
});

// Itt jöhetnek majd az újabb modulok:
// router.use('/termekek', require('./admin/products'));

module.exports = router;
