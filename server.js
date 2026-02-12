const express = require("express");
const path = require("path");
const app = express();
const PORT = 3000;

// Beállítjuk az EJS-t sablonmotornak
app.set("view engine", "ejs");

// A statikus fájlok (CSS, képek) továbbra is a public-ból jönnek
app.use(express.static("public"));

// 1. A főoldal kezelése (amikor nincs semmi a perjel után)
app.get("/", (req, res) => {
  res.render("index", (err, html) => {
    if (err) return res.status(404).render("404");
    res.send(html);
  });
});

// 2. Minden más oldal kezelése
app.get("/:page", (req, res) => {
  const page = req.params.page;

  res.render(page, (err, html) => {
    if (err) {
      // Ha nem találja a fájlt (pl. rossz URL), jöhet a 404
      return res.status(404).render("404");
    }
    res.send(html);
  });
});

app.listen(PORT, () => console.log(`Szerver: http://localhost:${PORT}`));
