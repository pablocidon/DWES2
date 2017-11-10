<!DOCTYPE html>
<html lang="es">
<head>
    <title>Práctica 3</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
</head>
<body>
<?php
//Llamada a la libreria de validación y declaración de variables.
require "LibreriaValidacion.php";
include "../confUsuarios.php";
//Variables superglobales.
define("MIN",1);
define("MAX",3);
$entradaOK = true;
$datos = array();
$errores = array();
$valido = 0;
$correcto = true;
//Arrays para la recogida de datos, errores y mensajes de error
$datos = array(
    'codigo' => '',
    'descripcion' => ''
);
$errores = array(
    'codigo' => '',
    'descripcion' => ''
);
$mensajeError = array(
    " ",
    "<strong>No ha introducido ningun valor</strong><br />",
    "<strong>El valor introducido no es valido</strong><br />",
    "<strong>Tamaño minimo no valido</strong><br />",
    "<strong>Tamaño maximo no valido</strong><br />"
);
//Realizamos la validación de los datos introducidos
if (filter_has_var(INPUT_POST, 'registrar')) {
    //Función de validación.
    $valido = validarCadenaAlfanumerica($_POST['codigo'],MIN,MAX);
    //Si hay algún error nos mostrará el mensaje.
    if ($valido != 0) {
        $errores['codigo'] = $mensajeError[$valido];
        $correcto = false;
        //Si no almacena el campo en el array
    } else {
        $datos['codigo'] = $_POST['codigo'];
    }
    //Función de validación.
    $valido = validarCadenaAlfabetica($_POST['descripcion']);
    //Si hay algún error nos mostrará el mensaje.
    if ($valido != 0) {
        $errores['descripcion'] = $mensajeError[$valido];
        $correcto = false;
        //Si no almacena el campo en el array
    } else {
        $datos['descripcion'] = $_POST['descripcion'];
    }
}
//Si no hemos pulsado el botón o hay algo que no sea correcto nos muestra el formulario
//Si hay algún error solamente se borrarán aquellos campos que tengan error.
if (!isset($_POST['registrar']) || !$correcto) {
    ?>
    <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
        <legend>
            <h1>NUEVO REGISTRO</h1>
        </legend>
        <label for="Codigo">Codigo de Departamento</label>
        <input type="text" name="codigo" placeholder="Codigo" <?php
        if (isset($_POST['codigo']) && empty($mensajeError['codigo'])) {
            echo 'value="', $_POST['codigo'], '"';
        }
        ?>/>
        <span class="error"><?php echo $errores['codigo']; ?></span>
        <br><br>
        <label for="descripcion">Descripción de Departamento:</label>
        <input type="text" name="descripcion" placeholder="Descripcion"<?php
        if (isset($_POST['descripcion']) && empty($mensajeError['descripcion'])) {
            echo 'value="', $_POST['descripcion'], '"';
        }
        ?>/>
        <span class="error"><?php echo $errores['descripcion']; ?></span>
        <br><br>
        <input id="calculo" type="submit" value="Registrar" name="registrar"/>
    </form>
    <?php
} else {
    //Si todo a salido correctamente realizamos la conexion con la base de datos.
    try{
        $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexión.
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
        $consulta=("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (\"" . $datos['codigo'] . "\",\"" . $datos['descripcion'] . "\")");//Ejecutamos la consulta
        $registros=$miDB->exec($consulta);//Devuelve 1 si se ha creado el registro y 0 si no se ha creado.
        if($registros==1){
            echo "Se ha creado el registro.";
        }else{
            echo "No se ha podido crear el registro.";
        }
        unset($miDB);
    }catch (PDOException $e){
        echo $e->getMessage();
        unset($miDB);
    }
}
?>
</body>
</html>
