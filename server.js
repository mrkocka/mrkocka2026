const express = require("express");
const path = require("path");
const helmet = require("helmet");
const session = require("express-session");
const SQLiteStoreFactory = require("connect-sqlite3");
const adminRoutes = require("./routes/admin");
const { initDatabase } = require("./lib/database");
const { csrfProtection } = require("./middleware/csrf");
require("dotenv").config();
const app = express();
const PORT = 3000;
const SQLiteStore = SQLiteStoreFactory(session);

// Beállítjuk az EJS-t sablonmotornak
app.set("view engine", "ejs");

// A statikus fájlok (CSS, képek) továbbra is a public-ból jönnek
app.use(express.static("public"));
app.use(express.urlencoded({ extended: false }));
app.use(express.json());
app.use(
  helmet({
    contentSecurityPolicy: false,
    crossOriginEmbedderPolicy: false,
  }),
);

// Session beállítása (ez kell a belépéshez)
app.use(
  session({
    secret: process.env.SESSION_SECRET,
    resave: false,
    saveUninitialized: false,
    store: new SQLiteStore({
      db: "sessions.db",
      dir: path.join(__dirname, "data"),
    }),
    cookie: {
      httpOnly: true,
      sameSite: "lax",
      secure: process.env.NODE_ENV === "production",
      maxAge: 1000 * 60 * 60 * 8,
    },
  }),
);
app.use(csrfProtection);

// Az admin modul beregisztrálása
app.use("/admin", adminRoutes);

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

const startServer = async () => {
  try {
    await initDatabase();
    app.listen(PORT, () => console.log(`Szerver: http://localhost:${PORT}`));
  } catch (err) {
    console.error("Hiba az adatbazis inicializalasakor:", err);
    process.exit(1);
  }
};

startServer();
