<?php
require_once('../../helpers/database.php');

class CategiaQueries
{

    public function readAll()
    {
        $sql = 'SELECT id_categoria_producto, nombre_categoria
        FROM categoria_producto';
        return Database::getRows($sql);
    }

    public function readOne()
    {
        $sql='SELECT * FROM categoria_producto
        WHERE id_categoria_producto = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM categoria_producto
                WHERE id_categoria_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}