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

}