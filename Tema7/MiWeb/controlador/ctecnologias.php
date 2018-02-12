<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 11-02-2018.
    * Archivo: ctecnologias.php
    * Modificado: 11-02-2018.
*/
$vista='tecnologias';
if (isset($_POST['volver'])){
    if(isset($_GET['paginaAnterior'])){
        header("Location: index.php?pagina=".$_GET['paginaAnterior']);
    }else{
        header("Location: index.php");
    }
}else{
    $_GET['pagina']="WIP";
    require_once "vista/layout.php";
}
?>