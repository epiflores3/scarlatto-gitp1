<?php
require_once('../../helpers/database.php');

class TallaQueries
{

    public function readAll()
    {
        $sql = 'SELECT id_talla, talla
        FROM talla';
        return Database::getRows($sql);
    }
   
    public function readOne()
    {
        $sql='SELECT * FROM talla
        WHERE id_talla = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM talla
                WHERE id_talla = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}