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