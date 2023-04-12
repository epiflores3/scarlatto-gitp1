<?php
require_once('../../helpers/database.php');

class DetalleProductoQueries
{
    public function readAll()
    {
        $sql = 'SELECT id_detalle_producto, existencia, nombre_producto, nombre_material, talla, marca
        FROM detalle_producto
        INNER JOIN producto USING(id_producto)
        INNER JOIN material USING(id_material)
        INNER JOIN talla USING(id_talla)
        INNER JOIN marca USING(id_marca)';
        return Database::getRows($sql);
    }

    public function readOne()
    {
        $sql='SELECT * FROM detalle_producto
        WHERE id_detalle_producto = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM detalle_producto
                WHERE id_detalle_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}