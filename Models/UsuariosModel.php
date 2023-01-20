<?php

require_once("../Base/Mysql.php");

class UsuariosModel extends Mysql
{

    private $intId;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $request = $this->select_all($sql);;
        return $request;
    }

    public function getUsuario($id)
    {
        $this->intId = $id;
        $sql = "SELECT * FROM usuarios WHERE idUsr = $this->intId";
        $request = $this->select($sql);
        return $request;
    }


    public function nuevoUsuario($datos)
    {
        $sql = "INSERT INTO usuarios (nombre,apePat,apeMat,telefono,nomUsr,password,tipo)
        VALUES (?,?,?,?,?,?,?)";
        $request = $this->insert($sql, $datos);
        return $request;
    }

    public function actualizarUsuario($idUsuario, $datos)
    {
        $sql = "UPDATE usuarios SET nombre = ?,apePat = ?,apeMat = ?,telefono = ?,nomUsr = ?,
        password = ?,tipo = ? WHERE idUsr = $idUsuario";
        $request = $this->update($sql, $datos);
        return $request;
    }

    public function actDes($datos)
    {
        $this->intId = $datos["idUsr"];
        $sql = "UPDATE usuarios SET status = ? WHERE idUsr =  $this->intId";
        $arrData = array($datos["status"]);
        $request = $this->update($sql, $arrData);
        return $request;
    }
}
