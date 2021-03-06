<?php
if(isset($_POST['programa'])){
    header("Location: programa.php");//Si pulsamos el botón nos envía a la página del programa
}
if(isset($_POST['salir'])){
    unset($_SESSION['usuario']);//Cerranmos la sesión
    header("Location: login.php");//Nos vamos a la página de login
}
?>
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
    <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type='submit' name='programa' value='Ir al Programa'/>
        <input type="submit" name="salir" value="Cerrar Sesión">
    </form>
</nav>
<h1>
    Ventana de Detalle
</h1>
<?php
session_start();//Cargamos la sesión que se ha creado
if(isset($_SESSION['usuario'])){
    echo "<strong>Bienvenido </strong>".$_SESSION['usuario'].'<br>';//Mostramos un mensaje de bienvenida para el usuario
}
if(isset($_SESSION['ultimaConexion'])){//Si la cookie no ha expirado mostramos la fecha y hora de la última conexión
    echo "<strong>Última conexión: </strong>".$_SESSION['ultimaConexion'].'<br>';
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