<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: clogin.php
    * Modificado: 15-01-2018.
*/
require_once "../modelo/UsuarioPDO.php";
if(isset($_POST['cancelar'])){
    header('Location:../index.html');
}
if(filter_has_var(INPUT_POST, 'aceptar')){
    $usuario = $_POST['usuario'];
    $password = hash('sha256', $_POST['password']);
    $resultado = UsuarioPDO::validarUsuario($usuario,$password);
    if($resultado->rowCount()==1){
        session_start();
        $_SESSION['usuario']=$usuario;
        $_SESSION['password']=$password;
    }else{
        $error = "Error en el usuario o contraseña";
    }
}
?>