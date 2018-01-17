<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: cinicio.php
    * Modificado: 17-01-2018.
*/
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
}
if(isset($_POST['salir'])){//Si pulsamos el boton de salir
    unset($_SESSION['usuario']);
    session_destroy();
    header("Location: index.php");//Vamos al fichero de entrada
}else{
    include_once "../vista/vinicio.php";//En el caso contrario cargamos la vista de inicio
}
?>