<?php
require_once("../Models/UsuariosModel.php");

$idUsuario = isset($_POST["idUsuario"]) ? $_POST["idUsuario"] : "";

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apePat = isset($_POST["apePat"]) ? $_POST["apePat"] : "";
$apeMat = isset($_POST["apeMat"]) ? $_POST["apeMat"] : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";

$nombreUsr = isset($_POST["nombreUsr"]) ? $_POST["nombreUsr"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : "";

$usuarios = new UsuariosModel();

switch ($_GET["op"]) {
    case "obtener":
        $arrData = $usuarios->getUsuarios();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnUpd = '';
            $btnAcc = '';

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<small class="badge badge-success" >Activo</small>';
                $btnAcc = '<button class="btn btn-danger btn-sm" onClick="ftnAccUsr(' . $arrData[$i]['idUsr'] . ',1)" title="Desactivar"><i class="fas fa-toggle-off"></i></button>';
            } else {
                $arrData[$i]['status'] = '<small class="badge badge-danger" >Inactivo</small>';
                $btnAcc = '<button class="btn btn-success btn-sm" onClick="ftnAccUsr(' . $arrData[$i]['idUsr'] . ',2)" title="Activar"><i class="fas fa-toggle-on"></i></button>';
            }

            $btnView = '<button class="btn btn-info btn-sm" onClick="ftnViewUsr(' . $arrData[$i]['idUsr'] . ')" title="Ver Usuario"><i class="far fa-eye"></i></button>';
            $btnUpd = '<button class="btn btn-primary btn-sm" onClick="ftnUpdUsr(' . $arrData[$i]['idUsr'] . ')" title="Actualizar Usuario"><i class="fas fa-user-edit"></i></button>';

            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnView . ' ' . $btnUpd . ' ' . $btnAcc . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;

    case "usrId":
        $arrData = $usuarios->getUsuario($idUsuario);
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;

    case "guardarActualizar":
        $request = "";
        $arrResponse = "";
        $encriptada = hash("SHA256", $password);
        $datos = array($nombre, $apePat, $apeMat, $telefono, $nombreUsr, $encriptada, $tipo);

        if (empty($idUsuario)) {
            //$datos = array("NUEVO USUARIO", $nombre, $apePat, $apeMat, $telefono, $nombreUsr, $encriptada, $tipo);
            $usuarios->nuevoUsuario($datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Registrado Correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible registrar el usuario.');
            }
        } else {
            $request = $usuarios->actualizarUsuario($idUsuario, $datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Actualizado Correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar el usuario.');
            }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;

    case "acciones":
        $arrResponse = "";
        $request = "";
        $datos = ["idUsr" => $idUsuario];

        if ($opcion == 1) {
            $datos["status"] = 0;
            $request = $usuarios->actDes($datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Desactivado.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible desactivar el usuario.');
            }
        } else {
            $datos["status"] = 1;
            $request = $usuarios->actDes($datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Activado.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible activar el usuario.');
            }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;
}

/*require_once("../Models/UsuariosModel.php");

$idUsuario = isset($_POST["idUsuario"]) ? $_POST["idUsuario"] : "";

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apePat = isset($_POST["apePat"]) ? $_POST["apePat"] : "";
$apeMat = isset($_POST["apeMat"]) ? $_POST["apeMat"] : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$nombreUsr = isset($_POST["nombreUsr"]) ? $_POST["nombreUsr"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : "";

$usuarios = new UsuariosModel();

switch ($_GET["op"]) {

    case "obtener":
        $arrData = $usuarios->getUsuarios();
        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnUpd = '';
            $btnAcc = '';

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<small class="badge badge-success" >Activo</small>';
                $btnAcc = '<button class="btn btn-danger btn-sm" onClick="ftnAccUsr(' . $arrData[$i]['idUsr'] . ',1)" title="Desactivar"><i class="fas fa-toggle-off"></i></button>';
            } else {
                $arrData[$i]['status'] = '<small class="badge badge-danger" >Inactivo</small>';
                $btnAcc = '<button class="btn btn-success btn-sm" onClick="ftnAccUsr(' . $arrData[$i]['idUsr'] . ',2)" title="Activar"><i class="fas fa-toggle-on"></i></button>';
            }

            $btnView = '<button class="btn btn-info btn-sm" onClick="ftnViewUsr(' . $arrData[$i]['idUsr'] . ')" title="Ver Usuario"><i class="far fa-eye"></i></button>';
            $btnUpd = '<button class="btn btn-primary btn-sm" onClick="ftnUpdUsr(' . $arrData[$i]['idUsr'] . ')" title="Actualizar Usuario"><i class="fas fa-user-edit"></i></button>';

            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnView . ' ' . $btnUpd . ' ' . $btnAcc . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        break;

    case "insertarActualizar":
        $request;
        $arrResponse;
        $password = hash("SHA256", $password);
        $datos = array($nombre, $apePat, $apeMat, $telefono, $nombreUsr, $password, $tipo);

        if (empty($idUsuario)) {
            $request = $usuarios->nuevoUsuario($datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Guardado Correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible registrar el usuario.');
            }
        } else {
            $request = $usuarios->actualizarUsuario($idUsuario, $datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Actualizado Correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar el usuario.');
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;
    case "usuarioID":
        $arrData = $usuarios->getUsuario($idUsuario);
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

        break;

    case "acciones":
        $arrResponse = "";
        $request = "";
        $datos = ["idUsr" => $idUsuario];

        if ($opcion == 1) {
            $datos["status"] = 0;
            $request = $usuarios->actDes($datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Desactivado.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible desactivar el usuario.');
            }
        } else {
            $datos["status"] = 1;
            $request = $usuarios->actDes($datos);
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Activado.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible activar el usuario.');
            }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        break;
}*/
