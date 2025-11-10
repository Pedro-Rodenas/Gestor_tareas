<!-- MODAL EDITAR -->
<div id="modalEdit" class="modal-overlay">
    <div class="modal">
        <h2 class="modal-title">Editar Tarea</h2>

        <form id="formEdit" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="editId">

            <input type="text" name="titulo" id="editTitulo" placeholder="Título" required>

            <textarea name="descripcion" id="editDescripcion" rows="4" placeholder="Descripción"></textarea>

            <label>Estado</label>
            <select name="completada" id="editCompletada">
                <option value="0">Proceso</option>
                <option value="1">Completado</option>
            </select>


            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModalEdit()">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>