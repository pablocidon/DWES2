<?php
    /*
     * Autor: Pablo Cidón.
     * Creado: 10-01-2018.
     * Archivo: index.php.
     * Modificado: 15-01-2018.
     */
if(isset($_SESSION['usuario'])){//Si no se ha creado la sesión mostramos la vista la login
    include_once "../vista/vlogin.php";
}else{//En caso de que se haya creado la sesión cargamos la vista de inicio
    include_once "../vista/vinicio.php";
}
?>