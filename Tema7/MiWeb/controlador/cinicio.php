<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: cinicio.php
    * Modificado: 18-01-2018.
*/
$vista='inicio';
if(!isset($_SESSION['usuario'])){
    header("Location: index.php?pagina=login");
}else{
    $_GET["pagina"]="inicio";
    require_once 'vista/layout.php';
}
if (isset($_POST['salir'])){
    unset($_SESSION['usuario']);
    session_destroy();
    header("Location: index.php?pagina=login");
}
?>