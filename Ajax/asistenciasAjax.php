<?php
require_once("../Models/AsistenciaModel.php");

$idAsistencia = isset($_POST["idAsistencia"]) ? $_POST["idAsistencia"] : "";

$idAsistenciaDictamen = isset($_POST["idAsistenciaDictamen"]) ? $_POST["idAsistenciaDictamen"] : "";
$descEquipo = isset($_POST["desEquipo"]) ? $_POST["desEquipo"] : "";
$numSerie = isset($_POST["numSerie"]) ? $_POST["numSerie"] : "";
$marca = isset($_POST["marca"]) ? $_POST["marca"] : "";
$modelo = isset($_POST["modelo"]) ? $_POST["modelo"] : "";
$inventario = isset($_POST["inventario"]) ? $_POST["inventario"] : "";
$asistente = isset($_POST["nombreAsistente"]) ? $_POST["nombreAsistente"] : "";
$analisis = isset($_POST["desDetEquipo"]) ? $_POST["desDetEquipo"] : "";
//$usuario = isset($_POST["usuario"]) ? $usuario = $_POST["usuario"]: $usuario = "";
//$password = isset($_POST["password"]) ? $password = $_POST["password"] : $password = "";


$asistencia = new AsistenciaModel();

switch ($_GET["op"]) {
    case "obtener":
        $arrData = $asistencia->getAsistencias();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            //$btnDict = '';
            //$btnRea = '';

            $btnView = '<button class="btn btn-info btn-sm btnViewAsistencia" onClick="ftnViewAsistencia(' . $arrData[$i]['id'] . ')" title="Ver Asistencia"><i class="far fa-eye"></i></button>';
            /*$btnDict = '<button class="btn btn-primary  btn-sm btnRealizarDictamen" onClick="fntRealizarDictamen('.$arrData[$i]['id'].')" title="Realizar Dictamen"><i class="fas fa-pencil-alt"></i></button>';
            $btnRea = '<button class="btn btn-success  btn-sm btnCompletado" onClick="fntCompletado('.$arrData[$i]['id'].')" title="Completar"><i class="fas fa-check-circle"></i></button>';
            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnView . ' ' . $btnDict . ' ' . $btnRea . '</div>';*/
            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnView . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;

    case "asistenciaID":
        $arrData = $asistencia->getAsistenciaId($idAsistencia);
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;

    case "completar":
        //$fecha_hora_actual = date('Y-m-d H:i:s');

        $request = $asistencia->noDictamen($idAsistencia);

        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible completar la asistencia.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;

    case "dictamen":
        $datos = array(
            $idAsistenciaDictamen, $descEquipo, $inventario, $modelo,
            $numSerie, $marca, $analisis, $asistente, $idAsistenciaDictamen
        );

       $request = $asistencia->realizarDictamen($datos);
        
        if ($request == 0) {
            $asistencia->actualizarAsistenciaDictamen($idAsistenciaDictamen);
            $arrResponse = array('status' => true, 'msg' => 'Dictamen realizado correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el dictamen.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;
}
