<!-- Modal de eliminación para contactos -->
<div class="modal fade" id="eliminarContactoModal<?=$contacto['id']?>" tabindex="-1" role="dialog" aria-labelledby="eliminarContactoModalLabel<?=$contacto['id']?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarContactoModalLabel<?=$contacto['id']?>">Confirmar Eliminación</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este contacto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="post">
                    <input type="hidden" name="contactoId" value="<?=$contacto['id']?>">
                    <button type="submit" name="eliminarContacto" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación para eventos -->
<div class="modal fade" id="eliminarEventoModal<?=$evento['id']?>" tabindex="-1" role="dialog" aria-labelledby="eliminarEventoModalLabel<?=$evento['id']?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarEventoModalLabel<?=$evento['id']?>">Eliminar Evento</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este evento?
            </div>
            <div class="modal-footer">
                <form method="post">
                    <input type="hidden" name="eventoId" value="<?=$evento['id']?>">
                    <button type="submit" name="eliminarEvento" class="btn btn-danger">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
