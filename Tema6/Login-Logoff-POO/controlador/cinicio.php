<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: cinicio.php
    * Modificado: 15-01-2018.
*/

if(isset($_POST['salir'])){//Si pulsamos el boton de salir
    header("Location: index.php");//Vamos al fichero de entrada
}else{
    include_once "../vista/vinicio.php";//En el caso contrario cargamos la vista de inicio
}
?>