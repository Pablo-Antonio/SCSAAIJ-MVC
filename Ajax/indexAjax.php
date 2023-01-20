<?php
require_once("../Models/IndexModel.php");

if (strlen(session_id()) < 1) {
    session_start(); //Validamos si existe o no la sesión
}

$usuario = isset($_POST["usuario"]) ? $usuario = $_POST["usuario"] : $usuario = "";
$password = isset($_POST["password"]) ? $password = $_POST["password"] : $password = "";

$solicitante = isset($_POST["solicitante"]) ? $_POST["solicitante"] : "";
$area = isset($_POST["area"]) ? $_POST["area"] : "";
$sede = isset($_POST["sede"]) ? $_POST["sede"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$anydesk = isset($_POST["anydesk"]) ? $_POST["anydesk"] : "";

$index = new IndexModel();

switch ($_GET["op"]) {
    case "iniciarSesion":
        $arrResponse;
        $password = hash("SHA256", $password);
        $request = $index->validarUsuario($usuario, $password);

        if ($request > 0) {
            //echo "existe";
            if ($request['status'] != 0) {
                $_SESSION['login'] = true;
                $_SESSION['fullName'] = $request['nombre'] . " " . $request['apePat'] . " " . $request['apeMat'];
                $_SESSION['tipo'] = $request['tipo'];
                $_SESSION['idUsr'] = $request['idUsr'];

                $arrResponse = array('status' => true, 'msg' => 'Bievenido.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Usuario Dado de Baja.');
            }
        } else {
            //echo "no existe";
            $arrResponse = array('status' => false, 'msg' => 'Usuario y/o Contraseña incorrectos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;

    case "enviarAsistencia":
        $fecha_hora_actual = date('Y-m-d H:i:s');
        $datos = array($solicitante, $sede, $area, $descripcion, $anydesk, $fecha_hora_actual);

        //print_r($datos);
        $request = $index->nuevaAsistencia($datos);

        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Asistencia enviada correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible enviar la asistencia.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();

        break;

    case "salir":
        //Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

        break;
}
