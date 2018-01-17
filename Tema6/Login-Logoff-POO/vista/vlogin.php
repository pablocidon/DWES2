<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vlogin.php
    * Modificado: 17-01-2018.
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
    <h1>LOGIN-LOGOFF</h1>
</header>
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usuario">Usuario</label>
    <input type="text" placeholder="Usuario" name="usuario">
    <br><br>
    <label for="password">Contraseña</label>
    <input type="password" placeholder="Contraseña" name="password">
    <br><br>
    <?php echo "<span class='error'>".$error."</span>";?>
    <br><br>
    <input type="submit" value="Aceptar" name="aceptar">
    <input type="submit" value="Cancelar" name="cancelar">
</form>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>
