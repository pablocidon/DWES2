<?php
/*
* Autor: Pablo Cidón.
* Creado: 14-01-2018.
* Archivo: index.php.
* Modificado:
*/

$conexion = new PDO();

$resultado = $conexion->query ('SELECT fecha, titulo FROM articulo');

$articulos = array();
while ($fila = $resultado->fetch(PDO::FETCH_OBJ)){
    $articulos[] = $fila;
}

unset($conexion);

require('vista.php');
?>