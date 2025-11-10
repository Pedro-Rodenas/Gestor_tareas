// ===== CREAR =====
window.openModal = function () {
    const modal = document.getElementById("modal-overlay");
    if (modal) modal.classList.add("show");
}

window.closeModal = function () {
    const modal = document.getElementById("modal-overlay");
    if (modal) modal.classList.remove("show");
}


// ===== EDITAR =====
window.openModalEdit = function (id, titulo, descripcion) {

    document.getElementById("modalEdit").classList.add("show");

    document.getElementById("editId").value = id;
    document.getElementById("editTitulo").value = titulo;
    document.getElementById("editDescripcion").value = descripcion;

    // Cambia dinámica la acción del form
    document.getElementById("formEdit").action = "/tareas/" + id;
}



// ===== ASIGNAR A BOTONES EDITAR =====
document.querySelectorAll(".edit-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        openModalEdit(
            btn.dataset.id,
            btn.dataset.titulo,
            btn.dataset.descripcion
        );
    });
});
