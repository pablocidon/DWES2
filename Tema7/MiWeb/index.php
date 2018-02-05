<?php
/*
 * Autor: Pablo Cidón.
 * Creado: 10-01-2018.
 * Archivo: index.php.
 * Modificado: 19-01-2018.
 */
require_once "config/conexionDB.php";
require_once "config/config.php";
require_once "modelo/Usuario.php";
require_once "core/LibreriaValidacion.php";
session_start();
if(isset($_SESSION['usuario'])&& !isset($_GET['pagina'])){
    include_once $controladores['inicio'];
}
if(isset($_GET['pagina'])){
    include_once $controladores[$_GET['pagina']];
}else{
    include_once $controladores['login'];
}
?>