<div class="modal fade" id="mdlUpdateUsr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">ACTUALIZAR USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <form id="form_actualizarUsuario" autocomplete="off">
                    <input type="hidden" id="hiddenIdUsr" name="hiddenIdUsr">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombre (s): </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre(s)">
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apePat" name="apePat" placeholder="Ingresar Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Materno:</label>
                            <input type="text" class="form-control" id="apeMat" name="apeMat" placeholder="Ingresar Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar Telefono">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre Usuario</label>
                            <input type="text" class="form-control" id="nombreUsr" name="nombreUsr" placeholder="Ingresar Nombre de Usuario">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña: </label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Ingresar Contraseña">
                        </div>

                        <div class="form-group">
                            <label for="">Tipo: </label>
                            <select class="custom-select form-control-border" id="tipo" name="tipo">
                                <option value="Pasante">Pasante</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-danger" 
                        data-dismiss="modal" onclick="">Cancelar</button>
                    </div>
                </form>
                <!-- /.card -->
            </div>
            <!--<div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" id="completar">Completar</button>
                <button type="button" class="btn btn-primary" id="dictamen">Dictamen</button>
            </div>-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->