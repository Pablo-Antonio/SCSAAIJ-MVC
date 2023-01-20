<?php
require_once("../Models/ModelDashboard.php");


$dashboard = new ModelDashboard();

switch ($_GET["op"]) {
    case "1":
        $request = $dashboard->asistenciasPendientes();
        echo count($request);
        break;
    case "2":
        $request = $dashboard->dictamenRealizados();
        echo count($request);
        break;
    case "3":
        $request = $dashboard->sinDictamen();
        echo count($request);
        break;
    case "4":
        $request = $dashboard->usuariosRegistrados();
        echo count($request);
        break;
}
