<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {//Si el usuario no se ha identificado
    header('WWW-Authenticate: Basic realm="Pablo"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Has pulsado Cancelar';
    exit;
} else {
require 'conexionDB.php';//Llamamos al fichero de configuración para conectarse a la base de datos
$entrada = false;
$usuario = $_SERVER['PHP_AUTH_USER'];//Alamacenamos el usuario en una variable.
$password = hash('sha256', $_SERVER['PHP_AUTH_PW']); //Almacenamos la contraseña encriptandola.
try {
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexion
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
    /*Creamos la consulta preparada que nos indicará si el usuario introducido y la contraseña existen en la base de datos.*/
    $consulta = $miDB->prepare("SELECT CodUsuario,Password FROM Usuarios WHERE CodUsuario=:usuario AND Password=:password");
    //Parámetros de la consulta
    $consulta->bindParam(':usuario', $usuario);
    $consulta->bindParam(':password', $password);
    $consulta->execute();//Ejecutamos la consulta
    if ($consulta->rowCount() != 0) {//Si la consulta devuelve algún resultado
        session_start();//Iniciamos la sesión
        setcookie("ultimaConexion", date("d-m-Y g:i:s"), time() + 172800000);//Creamos la cookie
        if(isset($_COOKIE['ultimaConexion'])){//Si la cookie no ha expirado mostramos la fecha y hora de la última conexión
            echo "<strong>Última conexión: </strong>".$_COOKIE['ultimaConexion'].'<br>';
        }
        $_SESSION['usuario']=$_SERVER['PHP_AUTH_USER'];//Guardamos el usuario que ha accedido
        $_SESSION['password']=hash("sha256",$_SERVER['PHP_AUTH_PW'],false);//Guardamos la contraseña del usuario que ha sido encriptada
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
    }else {//En caso de que el usuario no esté autentificado
        echo "No puedes acceder al contenido";
    }
} catch (PDOException $exception) {//Si salta la excepción
    header('WWW-Authenticate: Basic realm="Pablo"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Error en el Login';
    exit;
} finally {//Cerramos la conexión tanto si salta la excepción como si no
    unset($miDB);
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>PCB-DWES</title>
</head>
<body>
<?php
session_destroy();//Cerramos la sesión
}
?>
</body>
</html>