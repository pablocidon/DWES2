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
    <a href="borradoDepartamento.php"><button type="button" class="abierto" disabled><img src="images/borrar.png" alt="borrar">Borrar</button></a>
    <a href="importaDepartamento.php"><button type="button" disabled><img src="images/importar.png" alt="importar">Importar</button></a>
    <a href="exportaDepartamento.php"><button type="button" disabled><img src="images/exportar.png" alt="exportar">Exportar</button></a>
    <a href="../index.html"><button type="button"><img src="images/salir.png" alt="exportar">Salir</button></a>
</nav>
<br><br>
<?php
include 'Librerias/confUsuarios.php';//Incluimos la libreria para la conexion
include 'Librerias/LibreriaValidacion.php';//Incluimos la libreria para la validación de los campos
//Declaramos las variables para controlar cuando hay errores
$entradaOK = true;
$errores = array();
//Arrays para la recogida de datos, errores y mensajes de error
$errores = array(
    'codigo' => '',
    'descripcion' => ''
);
$datos='';
if(isset($_POST['Cancelar'])){
    header('Location:mtoDepartamentos.php');
}
try {
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//la conexión.
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
    if (isset($_GET['CodDepartamento'])) {
        $codigo = $_GET['CodDepartamento'];
        $consulta=$miDB->prepare("SELECT CodDepartamento, DescDepartamento FROM Departamento WHERE CodDepartamento=:cod_departamento");
        $consulta->bindParam(":cod_departamento",$codigo);
        $consulta->execute();
        if($consulta->rowCount()==1){
            $datos=$consulta->fetch(PDO::FETCH_OBJ);
        }
    }

    ?>
    <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
        <legend>
            <h2>Eliminar Registro:</h2>
        </legend>
        <label for="codigo">Código</label>
        <input type="text" name="codigo" value="<?php echo $datos->CodDepartamento ?>" readonly>
        <?php echo $errores['codigo']; ?>
        <br><br>
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $datos->DescDepartamento ?>" readonly>
        <?php echo $errores['descripcion']; ?>
        <br><br>
        <input id="aceptar" type="submit" value="Aceptar" name="Aceptar"/>
        <input id="cancelar" type="submit" value="Cancelar" name="Cancelar"/>
    </form>
    <?php
    if(isset($_POST['Aceptar'])) { //comprobamos si se ha pulsado aceptar
        $consulta=("DELETE FROM Departamento WHERE CodDepartamento = (\"" . $_POST['codigo']."\")");//Ejecutamos la consulta
        $registros=$miDB->exec($consulta);//Devuelve 1 si se ha creado el registro y 0 si no se ha creado.
        if($registros==1){
            echo "Se ha creado el registro.";
        }else{
            echo "No se ha podido crear el registro.";
        }
        header('Location:mtoDepartamentos.php');
    }
}catch (PDOException $e){
    echo $e->getMessage();
}finally{
    unset($miDB);
    exit();
}
?>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>