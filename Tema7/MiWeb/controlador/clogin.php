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
    if(isset($_SESSION['usuario'])){
        header("Location: index.php?pagina=inicio");
    }else{
        if (isset($_POST['cancelar'])){
            header("Location: ../../index.html");
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
                header("Location: index.php?pagina=inicio");
            } else {
                require_once('vista/layout.php');
        }
        if(isset($_POST['registro'])){
            $vista = "WIP";
            require_once('vista/layout.php');
        }
    }
?>
