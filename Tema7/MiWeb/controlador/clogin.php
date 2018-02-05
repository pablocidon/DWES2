<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: clogin.php
    * Modificado: 18-01-2018.
*/
$vista = "login";
$correcto = false;
$error='';
date_default_timezone_set('Europe/Madrid');
$conexion = date_default_timezone_get();
if(isset($_SESSION['usuario'])){
    header("Location: index.php?pagina=inicio");
}else{
    if(isset($_POST['registrar'])){
        header("Location: index.php?pagina=registro");
    }
    if(isset($_POST['aceptar'])) {
        $codUsuario = $_POST['usuario'];
        $password = $_POST['password'];
        $usuario = Usuario::validarUsuario($codUsuario, $password);

        if (is_null($usuario)) {
            $error = 'Usuario o contraseña incorrectos';
        } else {
            $correcto = true;
        }
    }
    if ($correcto) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = hash('sha256', $password);
        Usuario::contadorAccesos($_SESSION['usuario']);
        Usuario::ultimaConexion($_SESSION['usuario'],$conexion);
        header("Location: index.php?pagina=inicio");
    } else {
        require_once('vista/layout.php');
    }
}
?>
