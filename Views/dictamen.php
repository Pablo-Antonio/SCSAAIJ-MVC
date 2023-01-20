<?php
require_once("header.php");
require_once("modals/modalAsistencia.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Asitencias</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Asistencias</li>
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

                    <div class="card" id="listadoAsistencias">
                        <div class="card-header">
                            <h3 class="card-title">ASISTENCIAS PENDIENTES</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="asistencias" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Solicitante</th>
                                        <th>Sede</th>
                                        <th>Area</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Solicitante</th>
                                        <th>Sede</th>
                                        <th>Area</th>
                                        <th>Detalles</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div id="formularioDictamen">
                        <div><button type="button" class="btn btn-danger" id="cancelarDictamen">Cancelar Dictamen</button></div>
                        <br>

                        <div class="card card-primary">

                            <div class="card-header">
                                <h1 class="card-title" id="tituloDictamen">ASISTENCIA: </h1>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="form_dictamen" autocomplete="off">
                                <input type="hidden" id="hiddenDictamen" name="hiddenDictamen">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4>Datos Asistencia</h4>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Solicitante: </label>
                                        <p id="DsolicitanteAsistencia"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sede: </label>
                                        <p id="DsedeAsistencia"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripcion Asistencia: </label>
                                        <p id="DdescripcionAsistencia"></p>
                                    </div>

                                    <div class="form-group">
                                        <h4>Datos del Equipo</h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripción Equipo: </label>
                                        <input type="text" class="form-control" id="desEquipo" name="desEquipo" placeholder="Descripción del Equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Número Serie:</label>
                                        <input type="text" class="form-control" id="numSerie" name="numSerie" placeholder="Número de Serie del Equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Marca:</label>
                                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Modelo:</label>
                                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo del equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Inventario</label>
                                        <input type="text" class="form-control" id="inventario" name="inventario" placeholder="Inventario">
                                    </div>

                                    <div class="form-group">
                                        <h4>Asistente</h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre Asistente: </label>
                                        <input type="text" class="form-control" id="nombreAsistente" name="nombreAsistente" placeholder="Nombre del asistente que reviso el equipo">
                                    </div>

                                    <div class="form-group">
                                        <h4>Descripción Detallada del Equipo</h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripción Equipo: </label>
                                        <textarea class="form-control" rows="3" id="desDetEquipo" name="desDetEquipo" placeholder="Descripción Detallada del Análisis"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" id="realizarDictamen" class="btn btn-success">Realizar Dictamen</button>
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

    <script src="<?= $BASE_MEDIA ?>/js/functions_dictamen.js"></script>

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