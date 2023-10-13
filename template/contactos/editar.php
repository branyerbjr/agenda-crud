<!-- Modal de edición para contactos -->
<div class="modal fade" id="editarContactoModal<?=$contacto['id']?>" tabindex="-1" role="dialog" aria-labelledby="editarContactoModalLabel<?=$contacto['id']?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarContactoModalLabel<?=$contacto['id']?>">Editar Contacto</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar el contacto prellenado con detalles del contacto -->
                <form method="post">
                    <input type="hidden" name="contactoId" value="<?=$contacto['id']?>">
                    <div class="mb-3">
                        <label for="contactoNombre" class="form-label">Nombre del Contacto</label>
                        <input type="text" class="form-control" id="contactoNombre" name="contactoNombre" value="<?=$contacto['nombre']?>">
                    </div>
                    <div class="mb-3">
                        <label for="contactoEmail" class="form-label">Email del Contacto</label>
                        <input type="email" class="form-control" id="contactoEmail" name="contactoEmail" value="<?=$contacto['email']?>">
                    </div>
                    <button type="submit" name="editarContacto" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición para eventos -->
<div class="modal fade" id="editarEventoModal<?=$evento['id']?>" tabindex="-1" role="dialog" aria-labelledby="editarEventoModalLabel<?=$evento['id']?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarEventoModalLabel<?=$evento['id']?>">Editar Evento</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar el evento prellenado con detalles del evento -->
                <form method="post">
                    <input type="hidden" name="eventoId" value="<?=$evento['id']?>">
                    <div class="mb-3">
                        <label for="eventoNombre" class="form-label">Nombre del Evento</label>
                        <input type="text" class="form-control" id="eventoNombre" name="eventoNombre" value="<?=$evento['nombre']?>">
                    </div>
                    <div class="mb-3">
                        <label for="fechaEvento" class="form-label">Fecha del Evento</label>
                        <input type="date" class="form-control" id="fechaEvento" name="fechaEvento" value="<?=$evento['fecha']?>">
                    </div>
                    <button type="submit" name="editarEvento" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
