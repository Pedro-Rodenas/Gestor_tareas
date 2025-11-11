<div id="modal-overlay" class="modal-overlay">
    <div class="modal">
        <h2 class="modal-title">Nueva Tarea</h2>
        <form method="POST" action="{{ route('tareas.store') }}">
            @csrf

            <input name="titulo" type="text" placeholder="Título" required>
            <textarea name="descripcion" rows="4" placeholder="Descripción"></textarea>
            <select class="select" name="prioridad" rows="4">
                <option selected disabled>Seleccione Prioridad</option>
                <option value="Alta">Alta</option>
                <option value="Baja">Baja</option>
                <option value="Medio">Medio</option>
            </select>

            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

    </div>
</div>