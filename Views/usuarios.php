<?php
require_once("header.php");
if ($_SESSION["tipo"] == "Pasante") {
    require_once("error.php");
} else {
?>

    <?php
    require_once("modals/modalActualizarUsr.php");
    //require_once("modals/modalNuevoUsr.php");
    require_once("modals/modalVerUsr.php");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Usuarios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="divBtnNuevo">
                            <button type="button" class="btn btn-success" id="btnNuevoUsr">
                                <i class="fas fa-plus-circle"></i> Nuevo Usuario
                            </button>
                        </div>
                        <br id="br">

                        <div class="card" id="listadoUsuarios">
                            <div class="card-header">
                                <h3 class="card-title">USUARIOS REGISTRADOS</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableUsuarios" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            <th>Estatus</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            <th>Estatus</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div id="formularioNuevoUsuario">
                            <div><button type="button" class="btn btn-danger" id="btnCancelarUsr">REGRESAR</button></div>
                            <br>

                            <div class="card card-success">

                                <div class="card-header">
                                    <h1 class="card-title" id="tituloDictamen">REGISTRAR NUEVO USUARIO</h1>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="form_nuevoUsuario" autocomplete="off">
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
                                        <button type="submit" class="btn btn-success">REGISTRAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <?php
        require_once("footer.php");
        ?>

        <script src="<?= $BASE_MEDIA ?>/js/functions_usuarios.js"></script>

        <!-- DataTables  & Plugins -->
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/jszip/jszip.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?= $BASE_MEDIA ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<?php
}
?>