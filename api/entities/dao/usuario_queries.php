<?php
require_once('../../helpers/database.php');

class UsuarioQueries
{

    public function checkUser($alias)
    {
        $sql = 'SELECT id_usuario FROM usuario WHERE correo_usuario = ?';
        $params = array($alias);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->correo = $alias;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT clave_usuario FROM usuario WHERE id_usuario = ?';
        $params = array($this->id);
        $data= Database::getRow($sql,$params);
    if ($password==$data['clave_usuario']) {
    return true;
        }else{
     return false;
     }
    }

    public function readAll()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, correo_usuario, alias_usuario, tipo_usuario, estado_usuario
        FROM usuario
        INNER JOIN tipo_usuario USING(id_tipo_usuario)
        INNER JOIN estado_usuario USING(id_estado_usuario)
        ORDER BY apellido_usuario';
        return Database::getRows($sql);
    }

}