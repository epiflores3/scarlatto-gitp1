<?php
require_once('../../helpers/database.php');

class ClienteQuerie
{

    public function readAll()
    {
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, dui_cliente, correo_cliente, telefono_cliente, fecha_nac_cliente, direccion_cliente, clave_cliente, estado_cliente
        FROM cliente';
        return Database::getRows($sql);
    }

}