const projectData = {
    weboldalak: [
        {
            title: "Vállalkozói landing oldal",
            description: "Gyors, reszponzív bemutatkozó oldal modern felépítéssel, kapcsolatfelvételi fókuszpontokkal.",
            image: "./img/workTime.webp"
        },
        {
            title: "Szolgáltatás alapú weboldal",
            description: "Letisztult, üzleti célú weboldal jól strukturált szekciókkal és erős vizuális hierarchiával.",
            image: "./img/mrkocka.png"
        },
        {
            title: "WordPress céges oldal",
            description: "Könnyen kezelhető adminfelülettel és átlátható tartalomkezeléssel épített céges megoldás.",
            image: "./img/workTime.webp"
        }
    ],
    scriptek: [
        {
            title: "Automatikus mentési script",
            description: "Időzített futással készített mentési folyamat, naplózással és egyszerű hibakezeléssel.",
            image: "./img/workTime.webp"
        },
        {
            title: "Rendszerfigyelő segédscript",
            description: "Szerverállapot és szolgáltatások ellenőrzése gyors visszajelzésekkel és értesítési logikával.",
            image: "./img/mrkocka.png"
        },
        {
            title: "Adatfeldolgozó script",
            description: "Rutin folyamatok gyorsítására készített script, ismétlődő feladatok automatizálására.",
            image: "./img/workTime.webp"
        }
    ],
    programok: [
        {
            title: "Belső admin eszköz",
            description: "Egyszerűbb vállalati folyamatok támogatására készített egyedi program felhasználóbarát felülettel.",
            image: "./img/mrkocka.png"
        },
        {
            title: "Kezelőpanel alkalmazás",
            description: "Adatkezelésre és gyors műveletekre épített könnyen használható asztali vagy webes program.",
            image: "./img/workTime.webp"
        },
        {
            title: "Projektkövető megoldás",
            description: "Feladatok, státuszok és alapvető munkafolyamatok áttekintésére készített rendszer.",
            image: "./img/mrkocka.png"
        }
    ],
    esp32: [
        {
            title: "Szenzoros ESP32 projekt",
            description: "Érzékelőkkel és adatküldéssel működő IoT megoldás valós idejű állapotkövetéshez.",
            image: "./img/workTime.webp"
        },
        {
            title: "Okoseszköz vezérlő modul",
            description: "ESP32 alapú vezérlés automatizálási és távoli kapcsolódási lehetőségekkel.",
            image: "./img/mrkocka.png"
        },
        {
            title: "Wi-Fi alapú beágyazott rendszer",
            description: "Kompakt hardveres megoldás webes felülettel és egyszerű kezelhetőséggel.",
            image: "./img/workTime.webp"
        }
    ],
    serverek: [
        {
            title: "Linux webszerver környezet",
            description: "Domainnel, SSL-lel és stabil kiszolgálással felépített szerveres környezet éles használatra.",
            image: "./img/mrkocka.png"
        },
        {
            title: "Docker alapú szolgáltatás",
            description: "Konténerizált alkalmazáskörnyezet egyszerűbb telepítéssel és átláthatóbb üzemeltetéssel.",
            image: "./img/workTime.webp"
        },
        {
            title: "Fordított proxy megoldás",
            description: "Cloudflare vagy Nginx alapú réteg a biztonság, routing és publikus elérés rendezésére.",
            image: "./img/mrkocka.png"
        }
    ]
};

const projectsGrid = document.querySelector("#projectsGrid");
const projectFilterButtons = document.querySelectorAll(".projectFilterButton");

function createProjectCard(project) {
    return `
        <article class="projectCard card-style">
            <img class="projectImage" src="${project.image}" alt="${project.title}">
            <div class="projectCardBody">
                <h3 class="projectCardTitle ubuntu-bold">${project.title}</h3>
                <p class="projectCardDescription ubuntu-medium">${project.description}</p>
                <div class="projectCardActions">
                    <button class="btnStyle ubuntu-bold projectActionButton" type="button">Részletek</button>
                    <button class="btnStyle ubuntu-bold projectActionButton" type="button">Kód</button>
                    <button class="btnStyle ubuntu-bold projectActionButton" type="button">Demo</button>
                </div>
            </div>
        </article>
    `;
}

function renderProjects(category) {
    const projects = projectData[category] || [];
    projectsGrid.innerHTML = projects.map(createProjectCard).join("");
}

projectFilterButtons.forEach((button) => {
    button.addEventListener("click", () => {
        projectFilterButtons.forEach((item) => item.classList.remove("is-active"));
        button.classList.add("is-active");
        renderProjects(button.dataset.category);
    });
});

renderProjects("weboldalak");

const copyEmailButton = document.querySelector("#copyEmailButton");

if (copyEmailButton) {
    copyEmailButton.addEventListener("click", async () => {
        const targetId = copyEmailButton.dataset.copyTarget;
        const targetElement = document.querySelector(`#${targetId}`);

        if (!targetElement) {
            return;
        }

        const originalLabel = copyEmailButton.textContent;

        try {
            await navigator.clipboard.writeText(targetElement.textContent.trim());
            copyEmailButton.textContent = "Kimásolva";
        } catch (error) {
            copyEmailButton.textContent = "Nem sikerült";
        }

        window.setTimeout(() => {
            copyEmailButton.textContent = originalLabel;
        }, 1800);
    });
}
