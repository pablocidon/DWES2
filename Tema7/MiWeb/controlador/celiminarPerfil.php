<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 13-02-2018.
    * Archivo: celiminarPerfil.php
    * Modificado: 13-02-2018.
*/
$vista='eliminarPerfil';

if(isset($_POST['no'])){
    header('Location: index.php?pagina=editarPerfil');
}else{
    require_once 'vista/layout.php';
}
if(isset($_POST['si'])){
    Usuario::eliminarPerfil($_POST['codUsuario']);
    header('Location: index.php?pagina=login');
}
?>