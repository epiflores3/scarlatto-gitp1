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


}