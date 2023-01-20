<?php
require_once("../Base/Mysql.php");
class IndexModel extends Mysql{

    private $strUsr;
    private $strPass;

    function __construct()
    {
        parent::__construct();
    }

    public function validarUsuario($usr,$pass){
        $this->strUsr = $usr;
        $this->strPass = $pass;
        $sql = "SELECT * FROM usuarios WHERE nomUsr = '$this->strUsr' AND password = '$this->strPass'";
        $request = $this->select($sql);
        return $request;
    }

    public function nuevaAsistencia($datos){
        $sql = "INSERT INTO asistencias (solicitante,sede,area,descripcion,anydesk,fechaSoli) 
        VALUES (?,?,?,?,?,?)"; 
        $request_insert = $this->insert($sql,$datos);
        return $request_insert;
    }
}
