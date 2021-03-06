<?php
/**
 * Archivo: login.php
 * Autor: Pablo Cidón.
 * Creado: 13/12/2017
 * Modificado: 13/12/2017
 */
$error='';//Variable para mostrar los mensajes de error
require "ficheros/usuariosDB.php";//Fichero de configuración para conectarse a la base de datos
if(isset($_POST['cancelar'])){
    header('Location:../index.html');
}
if(filter_has_var(INPUT_POST, 'aceptar')) {
    $usuario = $_POST['usuario'];//Alamacenamos el usuario en una variable.
    $password = hash('sha256', $_POST['password']); //Almacenamos la contraseña encriptandola.
    try {
        //Establecemos la conexión a la base de datos para consultar que el usuario y contraseña son correctos
        $miDB=new PDO(DATOSCONEXION, USER,PASSWORD);
        $miDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = $miDB->prepare("SELECT * FROM Usuarios WHERE CodUsuario=:usuario AND Password=:password");
        //Parámetros de la consulta
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':password', $password);
        $consulta->execute();//Ejecutamos la consulta
        if ($consulta->rowCount() == 1) {//Si la consulta devuelve un resultado
            session_start();//Iniciamos la sesión
            $_SESSION['usuario']=$usuario;//Almacenamos el usuario que ha iniciado sesión.
            if($consulta->Perfil=='Administrador'){//En caso de que el usuario sea administrador
                header("Location: seguimiento.php");//Nos vamos a la ventana de la encuesta.
            }else{
                header("Location: encuesta.php");//Nos vamos a la ventana de la encuesta.
            }
        }else {
            $error = "Error en el usuario o contraseña";//Si no hay resultados mostramos de nuevo el login mostrando el mensaje de error
        }
    } catch (PDOException $exception) {
        echo $exception->getMessage();//En caso de que salte la excepción mostramos un mensaje.
    }finally{
        unset($miDB);//Cerramos la conexión con la base de datos.
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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
    <span class="error"><?php echo $error; ?></span>
    <br><br>
    <input type="submit" value="Aceptar" name="aceptar">
    <input type="submit" value="Cancelar" name="cancelar">
</form>
<footer>
    <p id="pie"><a href="index.html">Pablo Cidon Curso 2017-2018</a></p>
</footer>
</body>
</html>

