<?php
/*
 * Autor: Pablo Cidón.
 * Creado: 14-01-2018.
 * Archivo: Producto.php.
 * Modificado:
 */

$conexion = new PDO();
$resultado = $conexion->query('SELECT fecha, titulo FROM articulo');
?>
<html>
<head>
    <title>Listado de Artículos</title>
</head>
<body>
<h1>Listado de Artículos</h1>
<table>
    <tr><th>Fecha</th><th>Título</th></tr>
    <?php foreach ($articulos as $articulo): ?>
        <tr>
            <td><?php echo $articulo['fecha'] ?></td>
            <td><?php echo $articulo['titulo'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>