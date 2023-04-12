<?php
require_once('../../helpers/database.php');

class MarcaQueries
{
    public function readAll()
    {
        $sql = 'SELECT id_marca, marca
        FROM marca';
        return Database::getRows($sql);
    }

    public function readOne()
    {
        $sql = 'SELECT * FROM marca
        WHERE id_marca = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM marca
        WHERE id_marca = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}