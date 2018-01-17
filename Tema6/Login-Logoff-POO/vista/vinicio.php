<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vinicio.php
    * Modificado: 15-01-2018.
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    <!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->
    <title>PCB-DWES</title>
</head>
<body>
<header>
    <h1>BIENVENIDO <?php echo strtoupper($_SESSION['usuario']) ?></h1>
</header>
<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="submit" name="salir" value="Cerrar Sesión">
</form>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>
