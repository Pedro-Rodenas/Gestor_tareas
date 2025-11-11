// Animación opcional: flotante en inputs
document.querySelectorAll(".input-group input").forEach((input) => {
    input.addEventListener("focus", () => {
        input.parentNode.classList.add("active");
    });

    input.addEventListener("blur", () => {
        if (!input.value) {
            input.parentNode.classList.remove("active");
        }
    });
});
