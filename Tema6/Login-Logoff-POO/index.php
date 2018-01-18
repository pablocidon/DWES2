<?php
/*
 * Autor: Pablo Cidón.
 * Creado: 10-01-2018.
 * Archivo: index.php.
 * Modificado: 18-01-2018.
 */
require_once "config/conexionDB.php";
require_once "modelo/Usuario.php";
require_once "core/LibreriaValidacion.php";
session_start();
if(!isset($_SESSION['usuario'])){
    require_once "controlador/clogin.php";
}else{
    require_once "controlador/cinicio.php";
}
?>