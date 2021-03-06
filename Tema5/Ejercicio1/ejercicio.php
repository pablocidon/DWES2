<?php
if ($_SERVER['PHP_AUTH_USER']!='pablo' || $_SERVER['PHP_AUTH_PW']!="paso") {//Si no se ha introducido ese usuario o contraseña
    header('WWW-Authenticate: Basic realm="Pablo"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Has pulsado Cancelar';
    exit;
} else {
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
<?php
session_start();//Iniciamos la sesión
if($_SERVER['PHP_AUTH_USER']=="pablo" && $_SERVER['PHP_AUTH_PW']=="paso"){
    if(isset($_COOKIE['ultimaConexion'])){//Si la cookie no ha expirado mostramos la fecha y hora de la última conexión
        echo "<strong>Última conexión: </strong>".$_COOKIE['ultimaConexion'].'<br>';
    }
    $_SESSION['usuario']=$_SERVER['PHP_AUTH_USER'];//Guardamos el usuario que ha accedido
    $_SESSION['password']=hash("md5",$_SERVER['PHP_AUTH_PW'],false);//Guardamos la contraseña del usuario que ha sido encriptada
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
}else{
    echo "No puedes acceder al contenido";
}
}
session_destroy();//Cerramos la sesión
?>
</body>
</html>