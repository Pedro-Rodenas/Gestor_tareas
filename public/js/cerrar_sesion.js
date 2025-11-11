document.addEventListener("DOMContentLoaded", () => {
    const profileBtn = document.getElementById("profileBtn");
    const dropdown = document.getElementById("profileDropdown");

    profileBtn.addEventListener("click", () => {
        dropdown.classList.toggle("show");
    });

    // Cerrar si haces click fuera
    document.addEventListener("click", (e) => {
        if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove("show");
        }
    });
});
