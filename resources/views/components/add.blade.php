<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form action="{{route('calendar.store')}}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Añadir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input required type="text" class="form-control" name="name" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input  type="color" class="form-control" name="color"  id="colorInputAdvanced" value="#fff">
                        </div>
                        <div class="form-group">
                            <label for="color">Se repite:</label>
                            <input type="checkbox" name="recurrent" id="recurrent">
                        </div>
                        <input id="fecha" type="hidden" name="fecha" value="" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_add">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="save">Guardar cambios</button>
                </div>
            </div>
        </div>
    </form>
</div>
