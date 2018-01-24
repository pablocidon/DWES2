<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 24-01-2018.
    * Archivo: cWIP.php
    * Modificado: 24-01-2018.
*/
$vista='WIP';
if (isset($_POST['volver'])){
    header("Location: index.php?pagina=login");
}else{
    require_once 'vista/layout.php';
}
?>