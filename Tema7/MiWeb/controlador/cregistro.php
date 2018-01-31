<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 30-01-2018.
    * Archivo: cregistro.php
    * Modificado: 30-01-2018.
*/
$vista='registro';
$correcto = false;
$mensajeError = '';
if(isset($_POST['cancelar'])){
    header('Location: index.php?pagina=login');
}
if(isset($_SESSION['usuario'])){
    header("Location: index.php?pagina=registro");
}else{
    $_GET["pagina"]="registro";
    require_once 'vista/layout.php';
}
if(isset($_POST['aceptar'])){
    if($_POST['password'] === $_POST['password2']){
        $correcto = true;
    }else{
        $correcto = false;
        $mensajeError='Las contraseñas no coinciden';
    }
}
?>