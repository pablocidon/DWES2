<?php
/**
* Archivo: seguimiento.php
* Autor: Pablo Cidón.
* Creado: 13/12/2017
* Modificado: 18/12/2017
*/
include "ficheros/conexionDB.php";
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//la conexión.
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
}catch (PDOException $exception){
    echo $exception->getMessage();
}finally{
    unset($miDB);
    exit();
}
    $consulta1 = "SELECT DISTINCT Edad, count(CodUsuario) AS NumeroUsuarios FROM Resultados group by Edad";
    //Preparamos la consulta
    $sentencia1 = $db->prepare($consulta1);
    //Ejecutamos la consulta
    try {
        $sentencia1->execute();
    } catch (PDOException $PdoE) {
        //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
        echo "Error al ejecutar la consulta 1";
        unset($miDB);
    }
    //Guardamos el resultado como un objeto
    $resultadoConsulta1 = $sentencia1->fetch(PDO::FETCH_OBJ);
//Creamos la segunda consulta, esta consulta nos devolverá
//Número de encuestas realizadas por cada usuario
$consulta2 = "SELECT DISTINCT CodUsuario, COUNT(CodEncuesta) AS NumeroEncuestas FROM Resultados GROUP BY CodUsuario HAVING NumeroEncuestas > 1";
//Preparamos la consulta
$sentencia2 = $miDB->prepare($consulta2);
$sentencia2->execute();
//Ejecutamos la consulta
try {
    $sentencia2->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 2";
    unset($miDB);
}
//Creamos la tercera consulta, esta consulta nos devolverá
//Opinion de cada uno de los usuario en las diferentes encuestas
$consulta3 = "SELECT CodUsuario,Opinion FROM Resultados";
//Preparamos la consulta
$sentencia3 = $miDB->prepare($consulta3);
$sentencia3->execute();
//Ejecutamos
try {
    $sentencia3->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 3";
    unset($miDB);
}
//Creamos la cuarta consulta, esta consulta nos devolverá
//Cantidad de hombres y mujeres que han realizado las encuestas
$consulta4 = "SELECT DISTINCT Genero, COUNT(CodUsuario) AS CantidadEncuestados FROM Resultados GROUP BY Genero";
//Preparamos la consulta
$sentencia4 = $miDB->prepare($consulta4);
$sentencia4->execute();
//Ejecutamos
try {
    $sentencia4->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 4";
    unset($miDB);
}
//Creamos la quinta consulta, esta consulta nos devolverá
//Generos de película
$consulta5 = "SELECT DISTINCT Categoria, COUNT(CodUsuario) AS CantidadUsuarios FROM Resultados GROUP BY Categoria";
//Preparamos la consulta
$sentencia5 = $miDB->prepare($consulta5);
$sentencia5->execute();
//Ejecutamos
try {
    $sentencia5->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 5";
    unset($miDB);
}
//Creamos la sexta consulta, esta consulta nos devolverá
//Frecuencia con la que los usuarios acuden al cina
$consulta6 = "SELECT CodUsuario, Frecuencia FROM Resultados";
//Preparamos la consulta
$sentencia6 = $miDB->prepare($consulta6);
$sentencia6->execute();
//Ejecutamos
try {
    $sentencia6->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 6";
    unset($miDB);
}
//Creamos la septima consulta, esta consulta nos devolverá
//Si los usuarios acuden al cine dependiendo de la cartelera
$consulta7 = "SELECT DISTINCT(Cartelera), COUNT(CodEncuesta) AS CantidadEncuestados FROM Resultados GROUP BY Cartelera";
//Preparamos la consulta
$sentencia7 = $miDB->prepare($consulta7);
$sentencia7->execute();
//Ejecutamos
try {
    $sentencia7->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 7";
    unset($miDB);
}
//Creamos la septima consulta, esta consulta nos devolverá
//Numero de encuestas realizadas
$consulta8 = "SELECT COUNT(CodEncuesta) AS EncuestasRealizadas FROM Resultados";
//Preparamos la consulta
$sentencia8 = $miDB->prepare($consulta8);
$sentencia8->execute();
//Ejecutamos
try {
    $sentencia8->execute();
} catch (PDOException $PdoE) {
    //Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    echo "Error al ejecutar la consulta 8";
    unset($miDB);
}
$resultadoConsulta8 = $sentencia8->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Encuesta</title>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div class="encuesta">
    <h1>RESULTADOS DE LA ENCUESTA</h1>
    <?php
    //Mostramos el numero de encuestas realizadas
    echo("<strong>Número de encuestas realizadas: </strong> $resultadoConsulta8->EncuestasRealizadas<br /><br />");
    //Mostramos el usuario y la cantidad de encuestas que ha realizado
    echo("<strong>Cantidad de encuestados según la edad: </strong><br /><br />");
    echo "<table border='1'><tr><th>Usuario</th><th>Numero de veces que ha realizado la encuesta</th></tr>";
    while ($resultadoConsulta2 = $sentencia2->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta2->CodUsuario</td>";
        echo "<td>$resultadoConsulta2->NumeroEncuestas</td>";
        echo "</tr>";
    }
    echo "</table><br /><br />";
    //Mostramos la cantidad de encuestados en los diferentes rangos de edad
    echo("<strong>Cantidad de encuestados en función de la edad: </strong><br /><br />");
    echo "<table border='1'><tr><th>Edad</th><th>Cantidad de encuestados</th></tr>";
    while ($resultadoConsulta1 = $sentencia1->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta1->Edad</td>";
        echo "<td>$resultadoConsulta1->NumeroUsuarios</td>";
        echo "</tr>";
    }
    echo "</table><br /><br />";
    //Mostramos la opiniones de cada uno de los encuestados
    echo "<strong>Listado de opiniones: </strong><br /><br />";
    echo "<table border='1'><tr><th>Encuestado</th><th>Opiniones</th></tr>";
    while ($resultadoConsulta3 = $sentencia3->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta3->CodUsuario</td>";
        echo "<td>$resultadoConsulta3->Opinion</td>";
        echo "</tr>";
    }
    echo "</table><br /><br />";
    //Mostramos la opiniones de cada uno de los encuestados
    echo "<strong>Numero de encuestados en función del sexo: </strong><br /><br />";
    echo "<table border='1'><tr><th>Sexo</th><th>Cantidad</th></tr>";
    while ($resultadoConsulta4 = $sentencia4->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta4->Sexo</td>";
        echo "<td>$resultadoConsulta4->CantidadEncuestados</td>";
        echo "</tr>";
    }
    echo "</table><br /><br />";
    //Tipos de película que gustan a los usuarios
    echo "<strong>Cantidad de encuestados en función del género de película: </strong><br /><br />";
    echo "<table border='1'><tr><th>Genero</th><th>Cantidad</th></tr>";
    while ($resultadoConsulta5 = $sentencia5->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta5->Genero</td>";
        echo "<td>$resultadoConsulta5->CantidadUsuarios</td>";
        echo "</tr>";
    }
    //Frecuencia con la que cada usuario acude al cine
    echo "<strong>Frecuencia con la que los encuestados acuden al cine: </strong><br /><br />";
    echo "<table border='1'><tr><th>Usuario</th><th>Frecuencia</th></tr>";
    while ($resultadoConsulta6 = $sentencia6->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta6->CodUsuario</td>";
        echo "<td>$resultadoConsulta6->Frecuencia</td>";
        echo "</tr>";
    }
    echo "</table><br /><br />";
    //Usuarios que acuden dependiendo de la cartelera
    echo "<strong>Personas que acuden siempre que ven algo interesante en la cartelera: </strong><br /><br />";
    echo "<table border='1'><tr><th>Acuden</th><th>Usuario</th></tr>";
    while ($resultadoConsulta7 = $sentencia7->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>$resultadoConsulta7->Cartelera</td>";
        echo "<td>$resultadoConsulta7->CantidadEncuestados</td>";
        echo "</tr>";
    }
    echo "</table><br /><br />";
    ?>
</div>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>