<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento</title>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <!--Archivo: seguimiento.php
        Autor: Pablo Cidón.
        Creado: 23/11/2017
        Modificado: 27/11/2017 -->
</head>
<body>
<?php
include "librerias/confUsuarios.php";
include "librerias/LibreriaValidacion.php";
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//la conexión.
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
    $fechaActual = date('d-m-Y H:i:s');//Declaramos una variable para almacenar la fecha y hora actuales
    /*
     * Creamos la consulta que nos va a devolver la edad partiendo de la fecha de nacimiento, el número de participantes, la media del grado de
     * satrisfacción y el número de equipos desde los que se han realizado las encuestas
     */
    $consulta1="SELECT AVG(TIMESTAMPDIFF(YEAR, FechaNacimiento, CURDATE())) AS EdadMedia ,COUNT(*) AS NumeroParticipantes ,AVG(Satisfaccion) AS MediaSatisfaccion, COUNT(DISTINCT IP) AS NumeroEquipos FROM Campos";
    $sentencia1=$miDB->preparare($consulta1);// Preparamos la consulta
try {// Ejecutamos la consulta
    $sentencia1->execute();
} catch (PDOException $PdoE) {//Si ha habido un error mostrar el mensaje de error y cerramos la conexion
    ?>
    <script>alert(<?php echo "No se ha podido ejecutar la consulta 1";?>)</script>
<?php
unset($miDB);
}
$resultado1=$sentencia1->fetch(PDO::FETCH_OBJ );// Guardamos el resultado como un objeto
/*
 * Creamos la consulta que nos va a devolver todos aquellos equipos que han realizado encuestas, y el número de las mismas
 */
$consulta2 = "SELECT IP,COUNT(IP) AS NumeroEncuestas FROM Campos GROUP BY IP HAVING NumeroEncuestas > 1";
$sentencia2=$miDB->preparare($consulta2);// Preparamos la consulta
try {// Ejecutamos la consulta
    $sentencia2->execute();
} catch (PDOException $PdoE) {//Si ha habido un error mostrar el mensaje de error y cerramos la conexion
?>
    <script>alert(<?php echo "No se ha podido ejecutar la consulta 2";?>)</script>
<?php
unset($miDB);
}
/*
 * Consulta que nos va a devolver el nombre y apellidos de los alumnos los cuales han mostrado su opinión
 */
$consulta3 = "SELECT Nombre,Apellidos,Opinion FROM Campos WHERE Opinion != ''";
$sentencia3=$miDB->preparare($consulta3);// Preparamos la consulta
try {// Ejecutamos la consulta
    $sentencia3->execute();
} catch (PDOException $PdoE) {//Si ha habido un error mostrar el mensaje de error y cerramos la conexion
?>
    <script>alert(<?php echo "No se ha podido ejecutar la consulta 3";?>)</script>
<?php
unset($miDB);
}

}catch (PDOException $exception){//Si se produce un error muestra un mensaje
?>
    <script>alert(<?php  echo $e->getMessage();?>)</script>
    <?php
}finally{//Finalmente cerramos la conexión
    unset($miDB);
    exit();
}
?>
<div>
    <h1>Seguimiento de los Resultados de las Encuestas</h1>
    <?php
    echo("<strong>Fecha y hora actuales:</strong>     $fechaActual<br><br>");//Mostramos la fecha y hora actuales
    echo("<strong>Número de Participantes:</strong> $resultado1->NumeroParticipantes<br><br>");//Mostramos el número de participantes
    echo("<strong>Edad Media:</strong>" .round($resultado1->EdadMedia, 2, PHP_ROUND_HALF_UP)."<br><br>");//Mostramos la media de edad redondeando
    echo("<strong>Media Grado de Satisfacción:</strong>" .round($resultado1->MediaSatisfaccion, 2, PHP_ROUND_HALF_UP)."<br><br>");//Mostramos la media redondeando del grado de satisfacción
    echo("<strong>Numero de Equipos:</strong> $resultado1->NumeroEquipos<br><br>");//Mostramos el número de equipos desde los que se han realizado las encuestas
    echo '<hr>';
    echo("<strong>Dirección IP desde la que se han realizado más de 1 encuesta:</strong><br><br>");
    ?>
    <table border="1">
        <tbody>
        <th>
        <td>Dirección IP</td>
        <td>Número de encuestas</td>
        </th>
        <?php
        while ($resultado2 = $sentencia2->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>$resultado2->IP</td>";
            echo "<td>$resultado2->NumeroEncuestas</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table><hr>
    <?php
    echo("<strong>Listado de opiniones y sugerencias:</strong><br><br>");
    ?>
    <table border="1">
        <tbody>
        <th>
        <td>Alumnos</td>
        <td>Opinión</td>
        </th>
        <?php
        while ($resultado3 = $sentencia3->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>$resultado3->Apellidos $resultado3->Nombre</td>";
            echo "<td>$resultado3->Opinion</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table><hr>
    <input type="button" onclick="location.href = 'index.html'" name="Volver" value="Volver">
    <?php
    ?>
</div>
</body>
</html>