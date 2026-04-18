<?php

return [
    /*
    |--------------------------------------------------------------------------
    | 1. projekt: Levyndadesign
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'levyndadesign',
        'type' => 'website',

        // Kártyaadatok
        'title' => 'Levyndadesign',
        'summary' => 'Egy kedves barátom felkérésére készült oldal, amely apa és lánya közös művészetét és világlátását mutatja be.',
        'cover_image' => './img/portfolio/levyndadesign.png',
        'cover_alt' => 'Levyndadesign projekt borítóképe',
        'technologies' => ['WordPress'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Élő oldal', 'kind' => 'external', 'url' => 'https://www.levyndadesign.com/', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'Egy kedves barátom felkérésére készült ez az oldal, amely apa és lánya közös művészetét és világlátását mutatja be egyfajta digitális bemutatóteremként, több kategóriába rendezve tárva a képeket a látogatók elé. ',
            'body' => [
                'text' => 'Az egyik első munkám, mégis egy időtálló, bővíthető megoldás, amely a mai napig jól szolgálja tulajdonosát. A projekt célja az volt, hogy a művészetet a potenciális vásárlók számára is bemutassa, lehetőséget biztosítva a kapcsolatfelvételre webshop nélkül is. A megvalósításhoz a WordPress keretrendszert választottuk, mivel gyorsan és hatékonyan kezeli a nagy mennyiségű képet.',
                'images' => [
                    ['src' => './img/portfolio/levyndadesign.png', 'alt' => 'Levyndadesign teljes kezdőoldal'],
                    ['src' => './img/workTime.webp', 'alt' => 'Levyndadesign projekt munkafolyamat illusztráció'],
                ],
            ],
            'key_points' => [
                'WordPress alapú, könnyen bővíthető felépítés',
                'Hangulatra épülő vizuális megjelenés',
                'Átlátható tartalmi szerkezet',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 2. projekt: Romwaldmagic
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'romwaldmagic',
        'type' => 'website',

        // Kártyaadatok
        'title' => 'Romwaldmagic',
        'summary' => 'Előadóművészi bemutatkozó oldal erős vizuális jelenléttel, gyors áttekinthetőséggel és kapcsolatfelvételi fókuszpontokkal.',
        'cover_image' => './img/portfolio/Romwald.png',
        'cover_alt' => 'Romwaldmagic projekt borítóképe',
        'technologies' => ['HTML', 'CSS', 'JavaScript', 'Node.js'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Élő oldal', 'kind' => 'external', 'url' => 'https://www.romwaldmagic.hu/', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'A projekt fókusza egy olyan fellépői weboldal volt, ahol a látvány, a hitelesség és a könnyű kapcsolatfelvétel egyszerre kap hangsúlyt.',
            'body' => [
                'text' => 'A tervezésnél fontos szempont volt, hogy az oldal már az első pillanatban karakteresen mutassa be az előadót, mégse váljon túlzsúfolttá vagy nehezen követhetővé. A layout ezért tudatosan a vizuális fókuszokra, a rövid és ütős tartalmi blokkokra, valamint a könnyen megtalálható kapcsolatfelvételi pontokra épült. A technikai megvalósítás során az volt a cél, hogy a site gyors maradjon, és mobilon is ugyanazt a minőségi élményt adja.',
                'images' => [
                    ['src' => './img/portfolio/Romwald.png', 'alt' => 'Romwaldmagic kezdőoldal nézet'],
                    ['src' => './img/mrkocka.png', 'alt' => 'Romwaldmagic mobil vagy részletnézet illusztráció'],
                ],
            ],
            'key_points' => [
                'Erős vizuális hero rész',
                'Kapcsolatfelvételi fókuszpontok',
                'Mobilra is optimalizált felépítés',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 3. projekt: Celli Honismereti Egyesület
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'celli-honismereti-egyesulet',
        'type' => 'website',

        // Kártyaadatok
        'title' => 'Honismereti és Kulturális Egyesület',
        'summary' => 'Kulturális szervezet számára készült informatív weboldal, amely jól rendezett tartalmakkal és könnyen kezelhető szerkezettel működik.',
        'cover_image' => './img/portfolio/Cellihonismeret.png',
        'cover_alt' => 'Celli Honismereti Egyesület projekt borítóképe',
        'technologies' => ['WordPress'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Élő oldal', 'kind' => 'external', 'url' => 'https://www.cellihonismeret.hu/', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'A projekt célja egy olyan egyesületi oldal létrehozása volt, amely jól kezeli a sokféle tartalmat, miközben megőrzi az egyszerű áttekinthetőséget.',
            'body' => [
                'text' => 'Ebben a projektben a legnagyobb kihívást az jelentette, hogy az oldal ne csak esztétikailag legyen rendezett, hanem tartalmi szempontból is könnyen követhető maradjon. Egy ilyen szervezetnél többféle információ jelenik meg párhuzamosan, ezért a navigáció és a blokkszerkezet kialakítása kiemelten fontos volt. A fejlesztés során arra törekedtem, hogy a látogató rövid idő alatt megtalálja a keresett információt, miközben az oldal hosszabb távon is jól karbantartható maradjon.',
                'images' => [
                    ['src' => './img/portfolio/Cellihonismeret.png', 'alt' => 'Celli Honismereti Egyesület kezdőoldal'],
                    ['src' => './img/workTime.webp', 'alt' => 'Tartalmi szerkesztéshez kapcsolódó illusztráció'],
                ],
            ],
            'key_points' => [
                'Tartalomközpontú szerkezet',
                'Könnyen áttekinthető navigáció',
                'Hosszú távon is karbantartható felépítés',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 4. projekt: Kenyeri Hivatal
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'kenyeri-hivatal',
        'type' => 'website',

        // Kártyaadatok
        'title' => 'Kenyeri Közös Önkormányzati Hivatal',
        'summary' => 'Önkormányzati intézmény számára készített információs oldal, amely a hivatalos tartalmak áttekinthető megjelenítésére épül.',
        'cover_image' => './img/portfolio/KenyeriHivatal.png',
        'cover_alt' => 'Kenyeri Hivatal projekt borítóképe',
        'technologies' => ['WordPress'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Élő oldal', 'kind' => 'external', 'url' => 'https://www.kenyerihivatal.hu/', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'Ez a projekt egy olyan hivatalos webes felületet igényelt, ahol a megbízhatóság, az egyszerű használhatóság és a világos információs struktúra elsődleges szerepet kapott.',
            'body' => [
                'text' => 'Az ilyen típusú oldalaknál a hangsúly nem a látványos effekteken, hanem a tiszta információszerkezeten és a könnyű hozzáférhetőségen van. A fejlesztés során ezért a fő cél egy olyan felület kialakítása volt, ahol a látogatók gyorsan megtalálják a fontos dokumentumokat, ügyintézési információkat és kapcsolódó tartalmakat. A layout és a tartalmi rendezés ezt a gyakorlati használhatóságot támogatja minden nézetben.',
                'images' => [
                    ['src' => './img/portfolio/KenyeriHivatal.png', 'alt' => 'Kenyeri Hivatal főoldal nézet'],
                    ['src' => './img/workTime.webp', 'alt' => 'Önkormányzati weboldal fejlesztési illusztráció'],
                ],
            ],
            'key_points' => [
                'Közérthető információs felépítés',
                'Intézményi jelleghez igazított layout',
                'Gyors hozzáférés a fontos tartalmakhoz',
            ],
        ],
    ],


/*
    |--------------------------------------------------------------------------
    | 5. projekt: AircareKlíma
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'aircareklima',
        'type' => 'website',

        // Kártyaadatok
        'title' => 'Aircareklima',
        'summary' => 'Egy profi, sok beüzemeléssel a háta mögött álló cég számára készíthettem weboldalt. A cél egy egyszerű, de informatív felület megalkotása volt.',
        'cover_image' => './img/portfolio/aircareklima.png',
        'cover_alt' => 'aircareklima projekt borítóképe',
        'technologies' => ['WordPress'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Élő oldal', 'kind' => 'external', 'url' => 'https://www.aircareklima.hu/', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'Egy profi, sok beüzemeléssel a háta mögött álló cég számára készíthettem weboldalt. A cél egy egyszerű, de informatív felület megalkotása volt.',
            'body' => [
                'text' => 'A weboldalt már a kezdetektől azzal a céllal kezdtük fejleszteni, hogy később akár webshopként is működhessen. Ez magyarázza a webáruházakra jellemző szerkezetet, azonban jelenleg az oldal fő funkciója az információátadás. A cég saját hozzáféréssel képes feltölteni a különböző modelleket, valamint több, webshopokra jellemző funkciót is használhat az oldalon.',
                'images' => [
                    ['src' => './img/portfolio/aircareklima_I.png', 'alt' => 'klimasoldalkep1'],
                    ['src' => './img/portfolio/aircareklima_II.png', 'alt' => 'klimasoldalkep2'],
                ],
            ],
            'key_points' => [
                'Webshop jellegű felépítés',
                'Saját tartalom feltöltésének lehetősége',
                'Akciók és kiemelt termékek kezelése',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 5. projekt: Automatikus mentési script
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'automatikus-mentesi-script',
        'type' => 'script',

        // Kártyaadatok
        'title' => 'Automatikus mentési script',
        'summary' => 'Időzített mentési folyamat naplózással, hibakezeléssel és egyszerűen karbantartható működéssel.',
        'cover_image' => './img/workTime.webp',
        'cover_alt' => 'Automatikus mentési script előnézete',
        'technologies' => ['Bash', 'Cron', 'Linux'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Kód', 'kind' => 'external', 'url' => 'https://github.com/', 'target' => '_blank'],
            ['label' => 'Letöltés', 'kind' => 'external', 'url' => 'https://example.com', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'Ez a script olyan ismétlődő mentési feladatokat automatizál, amelyek kézi futtatás mellett könnyen hibaforrássá válhatnak.',
            'body' => [
                'text' => 'A script célja az volt, hogy az ismétlődő mentési feladatok ne kézi beavatkozással, hanem megbízható, időzített logika mentén fussanak. A megoldás naplózza a futási eredményeket, segít gyorsabban észrevenni az esetleges hibákat, és alapot ad arra is, hogy a rendszer később további mentési célokkal bővüljön. Az egész megközelítés a kiszámítható működésre és az egyszerű karbantarthatóságra épül.',
                'images' => [
                    ['src' => './img/workTime.webp', 'alt' => 'Automatikus mentési script illusztráció'],
                    ['src' => './img/mrkocka.png', 'alt' => 'Mentési folyamat technikai illusztráció'],
                ],
            ],
            'key_points' => [
                'Időzített futtatás',
                'Logfájl alapú visszakövethetőség',
                'Egyszerűen bővíthető működés',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 6. projekt: Belső admin alkalmazás
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'belso-admin-alkalmazas',
        'type' => 'app',

        // Kártyaadatok
        'title' => 'Belső admin alkalmazás',
        'summary' => 'Egyszerűbb belső folyamatok kezelésére készült webes alkalmazás átlátható adatkezeléssel és gyors műveletekkel.',
        'cover_image' => './img/mrkocka.png',
        'cover_alt' => 'Belső admin alkalmazás képernyőképe',
        'technologies' => ['PHP', 'JavaScript', 'SQLite'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Kód', 'kind' => 'external', 'url' => 'https://github.com/', 'target' => '_blank'],
            ['label' => 'Letöltés', 'kind' => 'external', 'url' => 'https://example.com', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'A projekt célja egy olyan könnyen kezelhető adminfelület létrehozása volt, ami segíti a napi belső folyamatok gyorsabb kezelését.',
            'body' => [
                'text' => 'A fejlesztés során a fő szempont az volt, hogy az adminfelület ne legyen túlterhelt, mégis gyorsan elérhetővé tegye a legfontosabb műveleteket. A felület struktúráját úgy alakítottam ki, hogy a napi használat során a státuszkezelés, a keresés és az adatmódosítás minél kevesebb lépésből álljon. Az alkalmazás ezzel nemcsak kényelmesebbé, hanem jóval átláthatóbbá is tette a belső munkafolyamatokat.',
                'images' => [
                    ['src' => './img/mrkocka.png', 'alt' => 'Belső admin alkalmazás fő nézete'],
                    ['src' => './img/workTime.webp', 'alt' => 'Admin alkalmazás fejlesztési illusztráció'],
                ],
            ],
            'key_points' => [
                'Státuszkezelés',
                'Gyors keresés és szűrés',
                'Egyszerű adatkarbantartás',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 7. projekt: Linux webszerver környezet
    |--------------------------------------------------------------------------
    */
    [
        // Azonosító és alaptípus
        'slug' => 'linux-webszerver-kornyezet',
        'type' => 'server',

        // Kártyaadatok
        'title' => 'Linux webszerver környezet',
        'summary' => 'Éles használatra felépített szerveres környezet domainnel, SSL-lel és stabil kiszolgálási alappal.',
        'cover_image' => './img/workTime.webp',
        'cover_alt' => 'Linux webszerver környezet illusztráció',
        'technologies' => ['Linux', 'Apache', 'Cloudflare', 'SSL'],

        // Kártya és popup gombok
        'actions' => [
            ['label' => 'Részletek', 'kind' => 'modal'],
            ['label' => 'Kód', 'kind' => 'external', 'url' => 'https://github.com/', 'target' => '_blank'],
        ],

        // Popup adatok
        'popup' => [
            'intro' => 'Ez a projekt egy stabilan üzemeltethető webszerver környezet kialakítására fókuszált, amely később is jól bővíthető marad.',
            'body' => [
                'text' => 'Itt a hangsúly a stabil és jól szervezett szerveroldali alap kialakításán volt. A cél az volt, hogy a publikálás, a domainkezelés, az SSL és az alap üzemeltetési szempontok egy olyan rendszerbe kerüljenek, amely később további szolgáltatásokkal is bővíthető. A projekt lényege nem egy látványos felület, hanem egy megbízható technikai háttér megteremtése volt, ami hosszabb távon is fenntartható marad.',
                'images' => [
                    ['src' => './img/workTime.webp', 'alt' => 'Linux webszerver környezet illusztráció'],
                    ['src' => './img/mrkocka.png', 'alt' => 'Szerveres infrastruktúra illusztráció'],
                ],
            ],
            'key_points' => [
                'Domain és DNS beállítások',
                'SSL és publikálási réteg',
                'Karbantartható webszerver struktúra',
            ],
        ],
    ],
];
