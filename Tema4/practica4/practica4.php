<!DOCTYPE html>
<html lang="es">
<head>
    <title>Práctica 4</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
    //Llamada a la libreria de validación y declaración de variables.
    require "LibreriaValidacion.php";
    include "../confUsuarios.php";
    $entradaOK = true;
    $valido = 0;
    $correcto = true;
    //Arrays para la recogida de datos, errores y mensajes de error
    $descripcion='';
    $errorDescripcion='';
    $mensajeError = array(
        " ",
        "<strong>No ha introducido ningun valor</strong><br />",
        "<strong>El valor introducido no es valido</strong><br />",
        "<strong>Tamaño minimo no valido</strong><br />",
        "<strong>Tamaño maximo no valido</strong><br />"
    );
    //Realizamos la validación de los datos introducidos
    if (filter_has_var(INPUT_POST, 'buscar')) {
        //Función de validación.
        $valido = validarCadenaAlfabetica($_POST['descripcion']);
        //Si hay algún error nos mostrará el mensaje.
        if ($valido != 0) {
            $errorDescripcion = $mensajeError[$valido];
            $correcto = false;
            //Si no almacena el campo en el array
        } else {
            $descripcion = $_POST['descripcion'];
        }
    }
//Si no hemos pulsado el botón o hay algo que no sea correcto nos muestra el formulario
//Si hay algún error solamente se borrarán aquellos campos que tengan error.
        if (!isset($_POST['buscar']) || !$correcto) {
    ?>
        <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
            <legend>
                <h1>BÚSQUEDA DE DEPARTAMENTOS</h1>
            </legend>
            <label for="descripcion">Descripción de Departamento:</label>
            <input type="text" name="descripcion" placeholder="Descripcion"<?php
            if (isset($_POST['descripcion']) && empty($errorDescripcion)) {
                echo 'value="', $_POST['descripcion'], '"';
            }
            ?>/>
            <span class="error"><?php echo $errorDescripcion; ?></span>
            <br><br>
            <input id="calculo" type="submit" value="Buscar" name="buscar"/>
        </form>
    <?php
        } else {
            //Si todo a salido correctamente realizamos la conexion con la base de datos.
            try{
                $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexión.
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
                $consulta = $miDB->prepare("SELECT * from Departamento WHERE DescDepartamento LIKE concat('%',:busqueda,'%')");
                $consulta->bindParam(':busqueda',$descripcion);
                $consulta->execute();
                while($departamento = $consulta->fetch(PDO::FETCH_OBJ)){
                    echo "<tr>";
                    echo "<td>".$departamento->CodDepartamento."</td>"."<br />";
                    echo "<td>".$departamento->DescDepartamento."</td>"."<br />";
                    echo "<td>".$departamento->FechaBaja."</td>"."<br />";
                    echo "</tr>";
                }
                if($consulta->rowCount()==0){
                    echo "No se han encontrado resultados";
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