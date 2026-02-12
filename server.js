const express = require("express");
const path = require("path");
const app = express();
const PORT = 3000;

// 1. Statikus fájlok kiszolgálása kiterjesztés nélkül (Szép URL-ek)
// Az 'extensions' opcióval az Express megpróbálja .html-ként is keresni a fájlt
app.use(
  express.static(path.join(__dirname, "public"), {
    extensions: ["html", "htm"],
  }),
);

// 2. 404-es hibaoldal kezelése
// Ez a rész csak akkor fut le, ha a fenti sor nem talált illeszkedő fájlt
app.use((req, res) => {
  res.status(404).sendFile(path.join(__dirname, "public", "404.html"));
});

app.listen(PORT, () => {
  console.log(`A szerver száguld: http://localhost:${PORT}`);
});
