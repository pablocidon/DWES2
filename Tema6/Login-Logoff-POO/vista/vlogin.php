<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vlogin.php
    * Modificado: 12-01-2018.
*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    <!--<link rel="stylesheet" type="text/css" href="../../../base.css">-->
    <title>PCB-DWES</title>
</head>
<header>
    <h1>LOGIN-LOGOFF-POO</h1>
</header>
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usuario">Usuario</label>
    <input type="text" placeholder="Usuario" name="usuario">
    <br><br>
    <label for="password">Contraseña</label>
    <input type="password" placeholder="Contraseña" name="password">
    <br><br>
    <span class="error"><?php echo $error; ?></span>
    <br><br>
    <input type="submit" value="Aceptar" name="aceptar">
    <input type="submit" value="Cancelar" name="cancelar">
</form>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
    <a href="../../index.html" id="menu">Volver</a>
</footer>
</body>
</html>
