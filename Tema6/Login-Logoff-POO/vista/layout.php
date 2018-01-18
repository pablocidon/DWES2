<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: layout.php
    * Modificado: 18-01-2018.
*/
$mostrar = 'vista/vlogin.php';
if(isset($_GET['pagina'])){
    $mostrar = $vistas[$_GET['pagina']];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
    <title>PCB-DWES</title>
</head>
<body>
<header>
    <h1>LOGIN-LOGOFF</h1>
</header>
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <?php require_once $mostrar ?>
</form>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>
