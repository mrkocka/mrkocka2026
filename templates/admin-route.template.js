const express = require("express");
const { body, matchedData } = require("express-validator");
const { validate } = require("../middleware/validation");

const router = express.Router();

// TODO: replace with your own view path, e.g. admin/products-form
const MODULE_VIEW = "admin/your-module";

// TODO: replace with shared auth middleware import when you centralize it
const isAdmin = (req, res, next) => {
  if (req.session && req.session.isLoggedIn) {
    return next();
  }

  return res.redirect("/admin/login");
};

const formRules = [
  body("title")
    .isString()
    .trim()
    .isLength({ min: 2, max: 120 }),
  body("isActive").optional().isIn(["on"]),
];

router.get("/", isAdmin, (req, res) => {
  return res.render(MODULE_VIEW, {
    error: null,
    values: {
      title: "",
      isActive: false,
    },
  });
});

router.post(
  "/",
  isAdmin,
  validate(formRules, (req, res) =>
    res.status(400).render(MODULE_VIEW, {
      error: "Hibas bemenet. Ellenorizd az adatokat.",
      values: {
        title: (req.body.title || "").trim(),
        isActive: req.body.isActive === "on",
      },
    }),
  ),
  async (req, res) => {
    try {
      const input = matchedData(req, {
        onlyValidData: true,
        locations: ["body"],
      });

      // TODO: persist input to DB/service
      const payload = {
        title: input.title,
        isActive: input.isActive === "on",
      };

      console.log("[admin-template] payload", payload);

      return res.redirect(req.originalUrl);
    } catch (err) {
      return res.status(500).render(MODULE_VIEW, {
        error: "Szerver hiba tortent.",
        values: {
          title: (req.body.title || "").trim(),
          isActive: req.body.isActive === "on",
        },
      });
    }
  },
);

module.exports = router;
