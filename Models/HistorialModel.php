<?php

require_once("../Base/Mysql.php");

class HistorialModel extends Mysql{

    private $intIdHistorial;

    public function __construct()
    {
        parent::__construct();
    }

    public function getHistorial()
    {
        $sql = "SELECT * FROM asistencias WHERE status != 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getCompletado($id)
    {
        $this->intIdHistorial = $id;
        $sql = "SELECT *, DATE_FORMAT(fechaSoli,'%d/%m/%Y') as fechaAsistencia 
        FROM asistencias WHERE id = $this->intIdHistorial";
        $request = $this->select($sql);
        return $request;
    }

    public function getDictamen($id)
    {
        $this->intIdHistorial = $id;
        $sql = "SELECT *, DATE_FORMAT(fechaSoli,'%d/%m/%Y') as fechaAsistencia 
        FROM asistencias 
        INNER JOIN historial
        ON asistencias.id = historial.idAsistencia
        WHERE asistencias.id = $this->intIdHistorial";
        $request = $this->select($sql);
        return $request;
    }
}
?>