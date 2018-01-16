<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 15-01-2018.
    * Archivo: UsuarioDB.php
    * Modificado: 15-01-2018.
 */
interface UsuarioDB{
    public static function validarUsuario($codUsuario,$password);
}
?>