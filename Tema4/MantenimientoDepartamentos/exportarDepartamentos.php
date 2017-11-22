<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mantenimiento Departamentos</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<header>
    <h1>MANTENIMIENTO DE DEPARTAMENTOS</h1>
</header>
<nav>
    <a href="mtoDepartamentos.php"><button type="button"><img src="images/inicio.png" alt="inicio">Inicio</button></a>
    <a href="altaDepartamento.php"><button type="button"><img src="images/nuevo.png" alt="nuevo">Nuevo</button></a>
    <a href="modificacionDepartamento.php"><button type="button" disabled><img src="images/editar.png" alt="editar">Editar</button></a>
    <a href="borradoDepartamento.php"><button type="button" disabled><img src="images/borrar.png" alt="borrar">Borrar</button></a>
    <a href="importarDepartamento.php"><button type="button" class="abierto"><img src="images/importar.png" alt="importar">Importar</button></a>
    <a href="exportaDepartamento.php"><button type="button" disabled><img src="images/exportar.png" alt="exportar">Exportar</button></a>
    <a href="../index.html"><button type="button"><img src="images/salir.png" alt="salir">Salir</button></a>
</nav>
<br><br>
<?php
include 'Librerias/confUsuarios.php';//Incluimos la libreria para la conexion
    try {
        $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexión
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de excepciones
        if (!filter_has_var(INPUT_POST, 'Exportar')) {//Si no se pulsado Exportar mostramos el formulario
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="Exportar"></label>
                <input type="submit" name="Exportar" id="Exportar" value="Exportar">
            </form>
            <?php
        } else {//Si se ha pulsado el botón
            $consulta = "SELECT * from Departamento";//Creamos la consulta
            $sentencia = $miDB->prepare($consulta);//Ejecutamos la consulta preparada
            $resultado = $sentencia->execute();//Ejecutamos la consulta
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Departamentos></Departamentos>');//Creamos el documento xml
            header("Content-type: text/xml");
            //Mientras dure el registro realizamos la lectura
            while ($registro = $sentencia->fetch(PDO::FETCH_OBJ)) {
                $departamento = $xml->addChild('Departamento');
                $departamento->addChild('CodDepartamento', $registro->CodDepartamento);
                $departamento->addChild('DescDepartamento', $registro->DescDepartamento);
            }
            $xml->asXML("../xml/Departamentos.xml");//Guardamos los datos en un archivo xml
        }
    } catch (PDOException $e) {//Si salta una excepción
        echo "Error: ".$exception->getMessage().'<br>';//Mostramos el mensaje del error
        echo "Codigo de error ".$exception->getCode().'<br>';//Mostramos el código del error
    }finally{//Si salta o no la excepción
        unset($sentencia);//Cerramos la consulta
        unset($miDB);//Cerramos la conexión de la base de datos
    }
?>
</body>
</html>