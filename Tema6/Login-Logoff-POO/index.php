<?php
    /*
     * Autor: Pablo Cidón.
     * Creado: 10-01-2018.
     * Archivo: index.php.
     * Modificado: 16-01-2018.
     */
    require_once "config/conexionDB.php";
    require_once "modelo/UsuarioPDO.php";
if(isset($_SESSION['usuario'])){//Si no se ha creado la sesión mostramos la vista la login
    include_once "vista/vlogin.php";
}else{//En caso de que se haya creado la sesión cargamos la vista de inicio
    include_once "vista/vinicio.php";
}
?>
