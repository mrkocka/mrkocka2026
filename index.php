<?php
$projects = require __DIR__ . '/data/projects.php';
$projectTypeLabels = [
    'website' => 'Weboldalak',
    'script' => 'Scriptek',
    'app' => 'Programok',
    'server' => 'Szerverek',
];

function escape_html(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <title>Mr.Kocka | Programozok, tehát vagyok!</title>
</head>

<body>
    <header>
        <img class="mrklogo" src="./img/logo/mrklogo.webp" alt="logo">
        <nav class="navbar">
            <ul class="menuList">
                <li class="menuListItem"><a class="ubuntu-bold" href="#welcome">Kezdőlap</a></li>
                <li class="menuListItem"><a class="ubuntu-bold" href="#services">Szolgáltatások</a></li>
                <li class="menuListItem"><a class="ubuntu-bold" href="#about">Rólam</a></li>
                <li class="menuListItem"><a class="ubuntu-bold" href="#skills">Ismereteim</a></li>
                <li class="menuListItem"><a class="ubuntu-bold" href="#projects">Projektek</a></li>
            </ul>
        </nav>
        <button class="btnStyle ubuntu-bold kapcsolatBtn" id="contact">Kapcsolat</button>
    </header>
    <main>
        <!-- Én open -->
        <article id="welcome" class="my-container">
            <section class="introContent">
                <h2 class="ubuntu-bold">Üdvözletem,</h2>
                <h2 class="ubuntu-bold">A nevem <span class="highlight">Radics Péter</span></h2>
                <h1 class="ubuntu-bold">Programozok, tehát vagyok!</h1>
                <p class="introText ubuntu-medium">Hadd meséljek egy kicsit magamról 2020 óta foglalkozom
                    programozással és IT területtel. Jól ismerem
                    és alkalmazom a webes technológiákat,
                    emellett naprakész ismeretekkel
                    rendelkezem WordPress és
                    rendszerüzemeltetés terén is. Linux
                    környezetben magabiztosan mozgok,
                    Proxmox szerveren szerzett virtualizációs
                    tapasztalatom mellett Docker-konténereket
                    és WireGuard alapú VPN-megoldásokat is használok.</p>
                <button class="btnStyle ubuntu-bold cvBtn">CV letöltése</button>
                <div class="socialWrap">
                    <ul class="socialList">
                        <li class="socialItem"><a href="#"><img src="./img/logo/github.svg" alt="githubLogo"></a></li>
                        <li class="socialItem"><a href="#"><img src="./img/logo/linkedin.svg" alt="linkedinLogo"></a>
                        </li>
                        <li class="socialItem"><a href="#"><img src="./img/logo/tiktok.svg" alt="tiktokLogo"></a></li>
                    </ul>
                </div>
            </section>
            <section class="introVisual">
                <img class="mrkockaPortre" src="./img/mrkocka.png" alt="Radics Péter portré">
            </section>
        </article>

        <!-- Szolgáltatások -->
        <article id="services">

            <div class="sectionHeading">

                <h2 class="ubuntu-bold serviceTitle">Szolgáltatások</h2>
                <p class="serviseText ubuntu-medium">Modern, gyors és üzletileg is használható webes megoldásokat
                    építek, letisztult
                    megjelenéssel és stabil technikai háttérrel.</p>
            </div>

            <section class="servicesContainer">
                <div class="card-style servicesCard">
                    <h3 class="ubuntu-bold">Webfejlesztés</h3>
                    <p>Modern, letisztult és felhasználóbarát weboldalak készítése erős vizuális hierarchiával és
                        reszponzív felépítéssel.
                    </p>
                    <ul class="serviceHighlights">
                        <li>Modern layoutok</li>
                        <li>Reszponzív design</li>
                    </ul>
                    <button class="btnStyle ubuntu-bold servicesButton">Érdekel</button>
                </div>

                <div class="card-style servicesCard">
                    <h3 class="ubuntu-bold">Rendszerüzemeltetés</h3>
                    <p>Segítek a szerverek, webtárhelyek,
                        adatbázisok és biztonsági
                        mentések kezelésében. Én üzemeltetem, Te használod.
                    </p>
                    <ul class="serviceHighlights">
                        <li>Biztonságos működés</li>
                        <li>Webhosting és support</li>
                    </ul>
                    <button class="btnStyle ubuntu-bold servicesButton">Érdekel</button>
                </div>

                <div class="card-style servicesCard">
                    <h3 class="ubuntu-bold">Hálózatépítés</h3>
                    <p> Kis- és középvállalkozások számára tervezek és építek stabil, biztonságos és jól bővíthető
                        hálózati megoldásokat.</p>
                    <ul class="serviceHighlights">
                        <li>Irodai hálózatok</li>
                        <li>Stabil hálózat</li>
                    </ul>
                    <button class="btnStyle ubuntu-bold servicesButton">Érdekel</button>
                </div>




                <div class="card-style servicesCard">
                    <h3 class="ubuntu-bold">Kamera</h3>
                    <p>Otthoni és üzleti kamerarendszerek telepítésében is segítek legyen szó IP kamerákról, távoli
                        elérésről.
                    </p>
                    <ul class="serviceHighlights">
                        <li>Távoli elérés</li>
                        <li>Rögzités akár 0/24-ben</li>
                    </ul>
                    <button class="btnStyle ubuntu-bold servicesButton">Érdekel</button>
                </div>

                <div class="card-style servicesCard">
                    <h3 class="ubuntu-bold">Okoseszközök</h3>
                    <p>Okos otthon? Igen! Segítek összekötni az eszközeidet: lámpák, szenzorok, termosztátok vagy
                        riasztók.
                    </p>
                    <ul class="serviceHighlights">
                        <li>Automatizálás</li>
                        <li>Távoli vezérlés</li>
                    </ul>
                    <button class="btnStyle ubuntu-bold servicesButton">Érdekel</button>
                </div>

                <div class="card-style servicesCard">
                    <h3 class="ubuntu-bold">Programozás</h3>
                    <p>Akár webes alkalmazásról, szkriptről vagy automatizálásról van szó, segítek leprogramozni, amit
                        elképzeltél.
                    </p>
                    <ul class="serviceHighlights">
                        <li>Automatizálás</li>
                        <li>Távoli vezérlés</li>
                    </ul>
                    <button class="btnStyle ubuntu-bold servicesButton">Érdekel</button>
                </div>


            </section>
        </article>

        <!-- Rólam -->
        <article id="about">
            <div class="aboutContent card-style">
                <div class="sectionHeading">
                    <h2 class="adoutTitle ubuntu-bold">Rólam</h2>
                </div>
                <div>
                    <p class="aboutText ubuntu-medium">Mindig is érdekelt az informatika, de sokáig csak hobbiként
                        tekintettem rá. Sokáig csupán egy kellemes időtöltés volt
                        számomra, egészen 2020-ig, amikor minden megváltozott. Elgondolkodtam azon, mi lenne, ha ez a
                        terület töltené ki a
                        mindennapjaimat. Elkezdtem tanfolyamokat keresni az interneten, és ekkor találtam rá a
                        Programozás Karrier programjára.
                        Egy éppen aktuális WordPress-versenyen előkelő helyezést értem el, ami megerősített abban, hogy
                        érdemes komolyabban
                        foglalkoznom a webfejlesztéssel. Szinte szédítő tempóban faltam a tudást, és eredeti
                        végzettségemből (szociális munka)
                        hozott képességeimmel és tapasztalataimmal azon dolgoztam, hogy értékes, nem mindennapi tagja
                        legyek az IT-szakmának.
                        Webes munkáim során törekszem meglátni az embert a megrendelő mögött, hiszen gyakran szoros
                        együttműködésre van szükség
                        a közös siker érdekében. A sikeres és működő projektjeimen túl igazi büszkeséggel és örömmel
                        tölt el, hogy ma már aktív
                        mentorként én is segíthetem a Programozás Karrier programjaira jelentkező, tanulni és fejlődni
                        vágyó érdeklődőket.
                    </p>
                </div>
                <div class="aboutImageWrap">
                    <img class="aboutImage" src="./img/workTime.webp" alt="Munka közbeni illusztráció">
                </div>
            </div>
        </article>

        <!-- Imsereteim -->
        <article id="skills">
            <div class="skillsHeading">
                <h2 class="ubuntu-bold">Ismereteim</h2>
                <p class="skillsLead ubuntu-medium">Gyakorlati tudás, stabil technikai alapok és fejlesztői szemlélet.
                </p>
            </div>
            <section class="skillsGrid">
                <div class="card-style skillCard">
                    <h3 class="ubuntu-bold">Alap készségek</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>Rendszerüzemeltetés</li>
                        <li>Backend szemlélet</li>
                        <li>Hibakeresés és problémamegoldás</li>
                        <li>Automatizálási gondolkodás</li>
                        <li>Gyakorlati fejlesztési megközelítés</li>
                    </ul>
                </div>
                <div class="card-style skillCard">
                    <h3 class="ubuntu-bold">Webfejlesztés</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>HTML és CSS</li>
                        <li>JavaScript</li>
                        <li>WordPress</li>
                        <li>Reszponzív felépítés</li>
                        <li>Node.js</li>
                        <li>PHP</li>
                        <li>Bootstrap</li>
                        <li>Adatbázis műveletek</li>
                    </ul>
                </div>

                <div class="card-style skillCard">
                    <h3 class="ubuntu-bold">Szerver üzemeltetés</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>Linux szerverek</li>
                        <li>Apache</li>
                        <li>Docker</li>
                        <li>PM2</li>
                        <li>Cloudflare</li>
                        <li>SSL</li>
                    </ul>
                </div>

                <div class="card-style skillCard">
                    <h3 class="ubuntu-bold">Hálózat</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>MikroTik (routing, NAT, VLAN)</li>
                        <li>VLAN és hálózati szegmentálás</li>
                        <li>VPN (WireGuard, OpenVPN)</li>
                        <li>PM2</li>
                        <li>Hálózati hibakeresés</li>
                    </ul>
                </div>

                <div class="card-style skillCard">
                    <h3 class="ubuntu-bold">Automatizálás és scripting</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>Bash scripting</li>
                        <li>Python</li>
                        <li>Időzített feladatok</li>
                        <li>Monitoring és értesítési logika</li>
                    </ul>
                </div>

                <div class="card-style skillCard">
                    <h3 class="ubuntu-bold">Eszközök és workflow</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>Git / GitHub</li>
                        <li>VS Code / PyCharm</li>
                        <li>DB Browser (SQLite)</li>
                        <li>Parancssoros munkavégzés (CLI)</li>
                    </ul>
                </div>

                <div class="card-style skillCard skillCardWide">
                    <h3 class="ubuntu-bold">Oktatás és tudásmegosztás</h3>
                    <ul class="skillTags ubuntu-medium">
                        <li>Programozás oktatás (Node.js, Python, WordPress)</li>
                        <li>Tananyag készítés</li>
                        <li>Gyakorlati projektek építése</li>
                        <li>Mentorálás és konzultáció</li>
                    </ul>
                </div>





            </section>
        </article>

        <!-- Projektek -->
        <article id="projects">
            <div class="projectsHeading">
                <h2 class="ubuntu-bold">Projektek</h2>
                <p class="projectsLead ubuntu-medium">Különböző területekről válogatott munkák, letisztult felépítéssel
                    és
                    gyors áttekinthetőséggel.</p>
            </div>
            <section class="projectsContainer">
                <div class="projectFilters" role="tablist" aria-label="Projekt kategóriák">
                    <?php foreach ($projectTypeLabels as $type => $label): ?>
                        <button class="projectFilterButton ubuntu-bold<?= $type === 'website' ? ' is-active' : ''; ?>" type="button"
                            data-category="<?= escape_html($type); ?>"><?= escape_html($label); ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="projectsPanel card-style">
                    <div class="projectsGrid" id="projectsGrid">
                        <?php foreach ($projects as $project): ?>
                            <article class="projectCard card-style"
                                data-project-type="<?= escape_html($project['type']); ?>">
                                <div class="projectImageWrap">
                                    <img class="projectImage" src="<?= escape_html($project['cover_image']); ?>"
                                        alt="<?= escape_html($project['cover_alt']); ?>">
                                </div>
                                <div class="projectCardBody">
                                    <div class="projectCardMeta">
                                        <span class="projectTypeTag ubuntu-medium"><?= escape_html($projectTypeLabels[$project['type']] ?? $project['type']); ?></span>
                                    </div>
                                    <h3 class="projectCardTitle ubuntu-bold"><?= escape_html($project['title']); ?></h3>
                                    <p class="projectCardDescription ubuntu-medium"><?= escape_html($project['summary']); ?></p>
                                    <ul class="projectTechList ubuntu-medium">
                                        <?php foreach ($project['technologies'] as $technology): ?>
                                            <li><?= escape_html($technology); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="projectCardActions">
                                        <?php foreach ($project['actions'] as $action): ?>
                                            <?php if (($action['kind'] ?? '') === 'modal'): ?>
                                                <button class="btnStyle ubuntu-bold projectActionButton" type="button"
                                                    data-project-modal-open="<?= escape_html($project['slug']); ?>"><?= escape_html($action['label']); ?></button>
                                            <?php else: ?>
                                                <a class="btnStyle ubuntu-bold projectActionButton"
                                                    href="<?= escape_html($action['url'] ?? '#'); ?>"
                                                    <?php if (!empty($action['target'])): ?>target="<?= escape_html($action['target']); ?>" rel="noopener noreferrer"<?php endif; ?>><?= escape_html($action['label']); ?></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </article>
        <div class="projectModals" aria-live="polite">
            <?php foreach ($projects as $project): ?>
                <div class="projectModal" id="modal-<?= escape_html($project['slug']); ?>" hidden>
                    <div class="projectModalBackdrop" data-project-modal-close></div>
                    <article class="projectModalDialog card-style" role="dialog" aria-modal="true"
                        aria-labelledby="project-modal-title-<?= escape_html($project['slug']); ?>">
                        <button class="projectModalClose btnStyle ubuntu-bold" type="button" data-project-modal-close>Bezárás</button>
                        <div class="projectModalHero">
                            <img class="projectModalImage" src="<?= escape_html($project['cover_image']); ?>"
                                alt="<?= escape_html($project['cover_alt']); ?>">
                            <div class="projectModalIntro">
                                <span class="projectTypeTag ubuntu-medium"><?= escape_html($projectTypeLabels[$project['type']] ?? $project['type']); ?></span>
                                <h3 class="ubuntu-bold" id="project-modal-title-<?= escape_html($project['slug']); ?>"><?= escape_html($project['title']); ?></h3>
                                <p class="projectModalLead ubuntu-medium"><?= escape_html($project['popup']['intro']); ?></p>
                                <div class="projectModalActions">
                                    <?php foreach ($project['actions'] as $action): ?>
                                        <?php if (($action['kind'] ?? '') !== 'modal'): ?>
                                            <a class="btnStyle ubuntu-bold projectActionButton"
                                                href="<?= escape_html($action['url'] ?? '#'); ?>"
                                                <?php if (!empty($action['target'])): ?>target="<?= escape_html($action['target']); ?>" rel="noopener noreferrer"<?php endif; ?>><?= escape_html($action['label']); ?></a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="projectModalBlocks">
                            <section class="projectBlock projectBodyBlock">
                                <h4 class="ubuntu-bold">Projekt áttekintés</h4>
                                <p class="projectBodyText ubuntu-medium"><?= escape_html($project['popup']['body']['text']); ?></p>
                                <?php if (!empty($project['popup']['body']['images'])): ?>
                                    <div class="projectGallery">
                                        <?php foreach ($project['popup']['body']['images'] as $image): ?>
                                            <img src="<?= escape_html($image['src']); ?>" alt="<?= escape_html($image['alt']); ?>">
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </section>

                            <section class="projectBlock projectKeyPointsBlock">
                                <h4 class="ubuntu-bold">Főbb elemek</h4>
                                <ul class="projectBlockList ubuntu-medium">
                                    <?php foreach ($project['popup']['key_points'] as $item): ?>
                                        <li><?= escape_html($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Kapcsolat -->
        <article id="contact">
            <div class="contactHeading">
                <h2 class="ubuntu-bold">Kapcsolat</h2>
                <p class="contactLead ubuntu-medium">Mondd el röviden, min dolgoznál velem, és nézzük meg, hogyan tudunk
                    belőle működő megoldást építeni.</p>
            </div>
            <section class="contactLayout">
                <form class="card-style contactForm">
                    <h3 class="ubuntu-bold">Írd meg az elképzelésed</h3>
                    <div class="contactFieldGrid">
                        <label class="contactField">
                            <span class="ubuntu-medium">Név</span>
                            <input type="text" name="name" placeholder="Neved">
                        </label>
                        <label class="contactField">
                            <span class="ubuntu-medium">Téma</span>
                            <input type="text" name="topic" placeholder="Pl. weboldal, automatizálás">
                        </label>
                    </div>
                    <label class="contactField">
                        <span class="ubuntu-medium">E-mail</span>
                        <input type="email" name="email" placeholder="email@pelda.hu">
                    </label>
                    <label class="contactField">
                        <span class="ubuntu-medium">Költségkeret</span>
                        <select name="budget">
                            <option value="">Válassz kategóriát</option>
                            <option value="small">100 000 Ft alatt</option>
                            <option value="medium">100 000 - 300 000 Ft</option>
                            <option value="large">300 000 Ft felett</option>
                        </select>
                    </label>
                    <label class="contactField">
                        <span class="ubuntu-medium">Projekt leírása</span>
                        <textarea name="message" rows="7"
                            placeholder="Írj pár mondatot arról, mire lenne szükséged."></textarea>
                    </label>
                    <button class="btnStyle ubuntu-bold contactSubmitButton" type="submit">Üzenet küldése</button>
                </form>

                <div class="card-style contactInfoCard">
                    <div class="contactInfoHighlight">
                        <h4 class="ubuntu-bold">Így dolgozunk együtt az első lépésektől.</h4>
                        <ul class="contactInfoSteps ubuntu-medium">
                            <li>Gyors egyeztetés az igényeidről és a céljaidról</li>
                            <li>Átlátható technikai irány és megvalósítási javaslat</li>
                            <li>Gyakorlati, hosszú távon is működő megoldások</li>
                        </ul>
                        <p class="contactInfoText ubuntu-medium">Ha már van konkrét elképzelésed, vagy csak egy ötleted,
                            amiből működő rendszert szeretnél, segítek megtalálni a megfelelő technikai irányt.</p>
                    </div>
                    <div class="contactDirectBox">
                        <p class="contactDirectLabel ubuntu-bold">Közvetlen elérhetőségek</p>
                        <div class="contactDirectMeta">
                            <p class="contactMetaLabel ubuntu-bold">Telefon</p>
                            <p class="contactDirectValue ubuntu-medium" id="contactPhoneValue">+36 30 123 4567</p>
                        </div>
                        <div class="contactDirectMeta">
                            <p class="contactMetaLabel ubuntu-bold">E-mail</p>
                            <p class="contactDirectValue ubuntu-medium" id="contactEmailValue">hello@mrkocka.hu</p>
                        </div>
                        <div class="contactDirectActions">
                            <a class="btnStyle ubuntu-bold contactActionButton" href="tel:+36301234567">Hívás</a>
                            <a class="btnStyle ubuntu-bold contactActionButton" href="mailto:hello@mrkocka.hu">Email
                                írása</a>
                            <button class="btnStyle ubuntu-bold contactActionButton" type="button" id="copyEmailButton"
                                data-copy-target="contactEmailValue">Másolás</button>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <footer>
        <div class="footerContent">
            <p class="footerBrand ubuntu-bold">Mr.Kocka</p>
            <nav class="footerNav" aria-label="Jogi információk">
                <a class="ubuntu-medium" href="#">Sütikezelés</a>
                <a class="ubuntu-medium" href="#">Adatkezelési szabályzat</a>
                <a class="ubuntu-medium" href="#">Impresszum</a>
            </nav>
            <p class="footerCopy ubuntu-medium">Copyright © 2020 - 2026 Mr.Kocka. Minden jog fenntartva.</p>
        </div>
    </footer>
    <script src="./js/main.js"></script>
</body>

</html>
