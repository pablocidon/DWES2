<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: layout.php
    * Modificado: 24-01-2018.
*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <!--<link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">-->
    <title>PCB-DWES</title>
</head>
<body>

<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h1>WEB DE PABLO</h1>
    <?php
        if ($vista=="login"){
            include_once 'vlogin.php';
        }else if ($vista=="inicio"){
            include_once 'vinicio.php';
        }else if ($vista=="WIP"){
            include_once 'vWIP.php';
        }else if($vista=='codigo'){
            include_once 'vcodigo.php';
        }
    ?>
</form>
<footer >
    <a href="documentacion/codigo.php">Acceso al Código</a>
    <a href="#">Acceso a PHP Doc</a>
    <a href="#">Acceso al Código</a>
    <a href="#">Acceso al Repositorio</a>
    <a href="#">Acceso a las Tecnologías</a>
    <p style="float: right" id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>
