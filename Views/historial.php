<?php
require_once("header.php");
require_once("modals/modalCompletado.php");
require_once("modals/modalDictamen.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Historial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Historial</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">HISTORIAL DE ASISTENCIAS</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="historial" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Solicitante</th>
                                        <th>Sede</th>
                                        <th>Area</th>
                                        <th>Dictamen</th>
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
                                        <th>Dictamen</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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

    <script src="<?= $BASE_MEDIA ?>/js/functions_historial.js"></script>

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