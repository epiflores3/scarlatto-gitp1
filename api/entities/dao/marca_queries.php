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
}