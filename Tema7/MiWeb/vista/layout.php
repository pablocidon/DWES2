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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="webroot/css/bootstrap-3.3.7-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="webroot/css/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
    <title>PCB-DWES</title>
</head>
<body>
<header>
    <div class="container">
        <h1>WEB DE PABLO</h1>
    </div>
</header>
<div class="container">
    <br><br>
    <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
        <?php
        if ($vista=="login"){
            include_once 'vlogin.php';
        }else if ($vista=="inicio"){
            include_once 'vinicio.php';
        }else if ($vista=="WIP"){
            include_once 'vWIP.php';
        }else if($vista=='codigo'){
            include_once 'vcodigo.php';
        }else if($vista=='registro'){
            include_once 'vregistro.php';
        }else if($vista=='SOAP') {
            include_once 'vWSSOAP.php';
        }
        ?>
    </form>
</div>

    <footer>
        <a class="col-md-2 col-md-offset-1" href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=codigo&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=codigo "; } ?>">Código</a>
        <a class="col-md-2" href="http://daw-usgit.sauces.local/PCB_1718/DWES2/tree/master/Tema7/MiWeb">Repositorio</a>
        <a class="col-md-2" href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>">Tecnologías</a>
        <a class="col-md-2" href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>">PHPDoc</a>
        <a class="col-md-2" href="../../index.html">Pablo Cidón</a>
    </footer>

<script type="text/javascript" href="webroot/css/bootstrap-3.3.7-dist/js/jquery-latest.js"></script>
<script type="text/javascript" href="webroot/css/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script type="text/javascript" href="webroot/css/bootstrap-3.3.7-dist/js/npm.js"></script>
</body>
</html>
