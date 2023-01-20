<?php
require_once("../Base/Mysql.php");

class ModelDashboard extends Mysql
{

    public function __construct()
    {
        parent::__construct();
    }

    public function asistenciasPendientes()
    {
        $sql = "SELECT * FROM asistencias WHERE status = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function dictamenRealizados()
    {
        $sql = "SELECT * FROM asistencias WHERE status = 2";
        $request = $this->select_all($sql);
        return $request;
    }

    public function sinDictamen()
    {
        $sql = "SELECT * FROM asistencias WHERE status = 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function usuariosRegistrados()
    {
        $sql = "SELECT * FROM usuarios";
        $request = $this->select_all($sql);
        return $request;
    }
}
