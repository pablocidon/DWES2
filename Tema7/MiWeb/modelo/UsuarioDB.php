<?php
/**
 * Interface Usuario
 *
 * Interfaz de objeto usuario
 *
 * @author Pablo Cidón Barrio.
 * @source: UsuarioDB.php
 * @since 12-01-2018.
 */
interface UsuarioDB{
    /**
     * @param $codUsuario
     * @param $password
     * @return mixed
     */
    public static function validarUsuario($codUsuario,$password);
}
?>