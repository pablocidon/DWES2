<?php
/**
 * Interface Usuario
 *
 * Interfaz de objeto usuario
 *
 * PHP version 7.0
 *
 * @category UsuarioDB
 * @package  OperacionesUsuario.
 * @author Pablo Cidón Barrio.
 * @source: UsuarioDB.php
 * @since Versión 1.0.
 * @copyright 07-02-2018.
 */
interface UsuarioDB{
    /**
     * @function validarUsuario()
     *
     * Función para la validación de los usuarios al iniciar sesión.
     *
     * @param $codUsuario Código del usuario.
     * @param $password Contraseña del usuario
     * @return mixed Si el usuario existe o no.
     */
    public static function validarUsuario($codUsuario,$password);
}
?>