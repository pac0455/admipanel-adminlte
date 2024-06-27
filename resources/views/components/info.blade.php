<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Título del modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Fecha</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody data-eventos>
                    {{-- AQUI SE CARGAN LOS EVENTOS  --}}
                    </tbody>
                </table>
                    <input id="add_info" type="submit" class="btn btn-primary" value="Añadir">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_info">Cerrar</button>
            </div>
        </div>
    </div>
</div>
