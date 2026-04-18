const projectCards = document.querySelectorAll(".projectCard");
const projectFilterButtons = document.querySelectorAll(".projectFilterButton");
const projectModalOpenButtons = document.querySelectorAll("[data-project-modal-open]");
const projectModalCloseButtons = document.querySelectorAll("[data-project-modal-close]");
const projectModals = document.querySelectorAll(".projectModal");
const copyEmailButton = document.querySelector("#copyEmailButton");

function setActiveProjectCategory(category) {
    projectFilterButtons.forEach((button) => {
        const isActive = button.dataset.category === category;
        button.classList.toggle("is-active", isActive);
        button.setAttribute("aria-selected", String(isActive));
    });

    projectCards.forEach((card) => {
        const shouldShow = card.dataset.projectType === category;
        card.classList.toggle("is-hidden", !shouldShow);
    });
}

function closeAllProjectModals() {
    projectModals.forEach((modal) => {
        modal.hidden = true;
    });

    document.body.classList.remove("is-modal-open");
}

projectFilterButtons.forEach((button) => {
    button.addEventListener("click", () => {
        setActiveProjectCategory(button.dataset.category);
    });
});

projectModalOpenButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const modalId = button.dataset.projectModalOpen;
        const targetModal = document.querySelector(`#modal-${modalId}`);

        if (!targetModal) {
            return;
        }

        closeAllProjectModals();
        targetModal.hidden = false;
        document.body.classList.add("is-modal-open");
    });
});

projectModalCloseButtons.forEach((button) => {
    button.addEventListener("click", () => {
        closeAllProjectModals();
    });
});

document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
        closeAllProjectModals();
    }
});

if (projectFilterButtons.length > 0) {
    setActiveProjectCategory(projectFilterButtons[0].dataset.category);
}

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
