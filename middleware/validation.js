const { validationResult } = require("express-validator");

const validate = (rules, onError) => [
  ...rules,
  (req, res, next) => {
    const errors = validationResult(req);
    if (errors.isEmpty()) {
      return next();
    }

    if (onError) {
      return onError(req, res, errors.array());
    }

    return res.status(400).json({
      error: "Validation error",
      details: errors.array(),
    });
  },
];

module.exports = {
  validate,
};
