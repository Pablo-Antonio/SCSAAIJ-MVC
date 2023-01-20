<?php
require_once("../Models/LoginModel.php");

class LoginController extends LoginModel{

    function __construct()
    {
        parent::__construct();
    }

    public function validarUsr($datos)
    {
        

        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');

        return json_encode($arrResponse,JSON_UNESCAPED_UNICODE);;
    }
}

?>