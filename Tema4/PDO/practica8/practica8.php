<?php
    include "../../confUsuarios.php";
    try {
        $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexión
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de excepciones
        if (!filter_has_var(INPUT_POST, 'Exportar')) {//Si no se pulsado Exportar mostramos el formulario
            ?>
            <html lang="en" xmlns="http://www.w3.org/1999/html">
                <head>
                    <title>Práctica 8</title>
                    <meta charset="UTF-8">
                    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
                </head>
                <body>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="Exportar"></label>
                        <input type="submit" name="Exportar" id="Exportar" value="Exportar">
                    </form>
                </body>
            </html>
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
