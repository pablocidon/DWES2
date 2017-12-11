<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>PCB-DWES</title>
</head>
<body>
<nav>
    <button><a href="programa.php">Ir a Detalle</a></button>
    <input type="submit" name="salir" value="Cerrar Sesión" disabled>
    <?php
    if(isset($_POST['salir'])){
        session_destroy();
    }
    ?>
</nav>
<?php
if(isset($_COOKIE['ultimaConexion'])){//Si la cookie no ha expirado mostramos la fecha y hora de la última conexión
    echo "<strong>Última conexión: </strong>".$_COOKIE['ultimaConexion'].'<br>';
}
echo "<h1>'\$_SERVER'</h1>";
if(isset($_SERVER)){
    foreach($_SERVER as $clave => $valor){//Recorremos la variable $_SERVER
        print("$clave => $valor</br>");//Asignamos los valores
    }
}else{//En caso de que no esté definida
    echo "La variable '\$_SERVER' no está definida";
}
echo "<h1>'\$_SESSION'</h1>";
if(isset($_SESSION)){
    foreach($_SESSION as $clave => $valor){//Recorremos la variable $_SESSION
        print("$clave => $valor</br>");//Asignamos los valores
    }
}else{
    echo "La variable '\$_SESSION' está vacía";//En caso de que no haya sesiones mostraremos que la variable se encuentra vacía.
}
echo '<br>';
echo "<h1>'\$_COOKIE'</h1>";
/*Establecemos la coockie, el tipo de dato y formato y el tiempo en el que expira en milisegundos.
En este caso la coockie permanecerá almacenada 48 horas*/
setcookie("ultimaConexion",date("d-m-Y g:i:s"),time()+172800000);
unset($_COOKIE['conexion']);
if(isset($_COOKIE)){
    foreach ($_COOKIE as $clave => $valor){//Recorremos la variable $_COOKIE
        print("$clave => $valor</br>");//Asignamos los valores
    }
}else{
    echo "La variable '\$_COOKIE' está vacía";//En caso de que se encuentre vacía.
}
?>
</body>
</html>