<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Título del modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input required type="text" class="form-control" name="name" value="" id="nombre_edit">
                </div>
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="color" class="form-control" name="color" id="edit_color" value="">
                </div>
                <div class="form-group">
                    <label for="color">Se repite:</label>
                    <input type="checkbox" name="recurrent" id="edit_recurrent">
                </div>
                <input id="fecha" type="hidden" name="fecha" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_edit">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="edit_save">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
