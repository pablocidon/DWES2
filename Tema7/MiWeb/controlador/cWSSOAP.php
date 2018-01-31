<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 30-01-2018.
    * Archivo: cWSSOAP.php
    * Modificado: 30-01-2018.
*/
$vista='SOAP';
if(!isset($_SESSION['usuario'])){
header("Location: index.php?pagina=login");
}else{
$_GET["pagina"]="SOAP";
require_once 'vista/layout.php';
}
if (isset($_POST['salir'])){
unset($_SESSION['usuario']);
session_destroy();
header("Location: index.php?pagina=login");
}
?>