<?php
require_once('../../helpers/database.php');

class MaterialQueries
{
    public function readAll()
    {
        $sql = 'SELECT id_material, nombre_material
        FROM material';
        return Database::getRows($sql);
    }

    public function readOne()
    {
        $sql='SELECT * FROM material
        WHERE id_material = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM material
                WHERE id_material = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}