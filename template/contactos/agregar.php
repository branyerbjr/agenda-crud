<!-- Modales para agregar evento y contacto -->
<div class="modal fade" id="agregarEventoModal" tabindex="-1" role="dialog" aria-labelledby="agregarEventoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarEventoModalLabel">Agregar Evento</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar evento -->
                <form method="post">
                    <div class="mb-3">
                        <label for="eventoNombre" class="form-label">Nombre del Evento</label>
                        <input type="text" class="form-control" id="eventoNombre" name="eventoNombre">
                    </div>
                    <div class="mb-3">
                        <label for="fechaEvento" class="form-label">Fecha del Evento</label>
                        <input type="date" class="form-control" id="fechaEvento" name="fechaEvento">
                    </div>
                    <button type="submit" name="guardarEvento" class="btn btn-primary">Guardar Evento</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarContactoModal" tabindex="-1" role="dialog" aria-labelledby="agregarContactoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarContactoModalLabel">Agregar Contacto</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar contacto -->
                <form method="post">
                    <div class="mb-3">
                        <label for="contactoNombre" class="form-label">Nombre del Contacto</label>
                        <input type="text" class="form-control" id="contactoNombre" name="contactoNombre">
                    </div>
                    <div class="mb-3">
                        <label for="contactoEmail" class="form-label">Email del Contacto</label>
                        <input type="email" class="form-control" id="contactoEmail" name="contactoEmail">
                    </div>
                    <div class="mb-3">
                        <label for="contactoTelefono" class="form-label">Teléfono del Contacto</label>
                        <input type="number" class="form-control" id="contactoTelefono" name="contactoTelefono">
                    </div>
                    <button type="submit" name="guardarContacto" class="btn btn-success">Guardar Contacto</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Formulario para agregar Token -->
<div class="modal fade" id="agregarTokenModal" tabindex="-1" role="dialog" aria-labelledby="agregarTokenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarTokenModalLabel">Agregar Token</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="idInstance" class="form-label">ID Instance</label>
                        <input type="text" class="form-control" id="idInstance" name="idInstance">
                    </div>
                    <div class="mb-3">
                        <label for="apiTokenInstance" class="form-label">API Token Instance</label>
                        <input type="text" class="form-control" id="apiTokenInstance" name="apiTokenInstance">
                    </div>
                    <button type="submit" name="guardarToken" class="btn btn-primary">Guardar Token</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
