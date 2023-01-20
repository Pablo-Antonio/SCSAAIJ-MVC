<?php
require_once("../Models/HistorialModel.php");

$idHistorial = isset($_POST["idHistorial"]) ? $_POST["idHistorial"] : "";

$historial = new HistorialModel();

switch ($_GET["op"]) {
    case "obtener";
        $arrData = $historial->getHistorial();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnAccion = '';

            if ($arrData[$i]['status'] == 0) {
                $btnAccion = '<button class="btn btn-danger btn-sm" id="btnCompletado" onClick="ftnViewCompletado(' . $arrData[$i]['id'] . ')" title="Sin Dictamen">NO</button>';
            } else if ($arrData[$i]['status'] == 2) {
                $btnAccion = '<button class="btn btn-success btn-sm" id="btnDictamen" onClick="ftnViewDictamen(' . $arrData[$i]['id'] . ')" title="Con Dictamen">SI</button>';
            }

            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnAccion . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;
        break;

    case "compledatoID";
        $arrData = $historial->getCompletado($idHistorial);
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;

    case "dictamenID";
        $arrData = $historial->getDictamen($idHistorial);
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;
}
