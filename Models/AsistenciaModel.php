<?php
require_once("../Base/Mysql.php");
class AsistenciaModel extends Mysql
{

    private $intId;

    function __construct()
    {
        parent::__construct();
    }

    public function getAsistencias()
    {
        $sql = "SELECT * FROM asistencias WHERE status = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getAsistenciaId($id)
    {
        $this->intId = $id;
        $sql = "SELECT *, DATE_FORMAT(fechaSoli,'%d/%m/%Y') as fechaAsistencia FROM asistencias WHERE id = $this->intId";
        $request = $this->select($sql);
        return $request;
    }

    public function realizarDictamen($datos)
    {
        $sql = "INSERT INTO historial (idHistorial,descripcionEquipo,inventario,modelo
        ,numeroSerie,marca,descripcionDictamen,asistente,idAsistencia) 
        VALUES (?,?,?,?,?,?,?,?,?)";
        $request_insert = $this->insert($sql, $datos);
        return $request_insert;
    }

    public function noDictamen($id)
    {
        $this->intId = $id;
        $sql = "UPDATE asistencias SET status = ? WHERE id =  $this->intId";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function actualizarAsistenciaDictamen($id)
    {
        $this->intId = $id;
        $sql = "UPDATE asistencias SET status = ? WHERE id =  $this->intId";
        $arrData = array(2);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function getHistorial()
    {
        $sql = "SELECT * FROM historial";
        $request = $this->select_all($sql);
        return $request;
    }
}
