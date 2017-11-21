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
    <a href="altaDepartamento.php"><button type="button"  class="abierto"><img src="images/nuevo.png" alt="nuevo">Nuevo</button></a>
    <a href="modificacionDepartamento.php"><button type="button" disabled><img src="images/editar.png" alt="editar">Editar</button></a>
    <a href="borradoDepartamento.php"><button type="button" disabled><img src="images/borrar.png" alt="borrar">Borrar</button></a>
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
$datos = array();
$errores = array();
//Arrays para la recogida de datos, errores y mensajes de error
$datos = array(
    'codigo' => '',
    'descripcion' => ''
);
$errores = array(
    'codigo' => '',
    'descripcion' => ''
);
if(isset($_POST['Cancelar'])){
    header('Location:mtoDepartamentos.php');
}
if(isset($_POST['Aceptar'])) { //comprobamos si se ha pulsado aceptar
    $errores['codigo']=comprobarTexto($_POST['codigo'],3,0,1);
    $errores['descripcion']=comprobarTexto($_POST['descripcion'],250,0,1); //comprobamos si hay errores

    foreach($errores as $valor){  //recorremos el array de errores
        if($valor!=null){
            $entradaOK=false;
        }
    }
}
if(!filter_has_var(INPUT_POST,'Aceptar')|| $entradaOK==false ) {//Si no se ha pulsado aceptar o hay algo mal mostramos el formulario
    ?>
    <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
        <legend>
            <h2>Nuevo Registro:</h2>
        </legend>
        <label for="codigo">Código</label>
        <input type="text" name="codigo" <?php if (isset($_POST['codigo']) && empty($errores['codigo'])) {
            echo 'value="', $_POST['codigo'], '"';
        } ?> >
        <?php echo $errores['codigo']; ?>
        <br><br>
        <label for="descripcion">Descripcion</label>
        <input type="text"
               name="descripcion" <?php if (isset($_POST['descripcion']) && empty($errores['descripcion'])) {
            echo 'value="', $_POST['descripcion'], '"';
        } ?> >
        <?php echo $errores['descripcion']; ?>
        <br><br>
        <input id="aceptar" type="submit" value="Aceptar" name="Aceptar"/>
        <input id="cancelar" type="submit" value="Cancelar" name="Cancelar"/>
    </form>
    <?php
}else {
    try{
        $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//la conexión.
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
        $consulta=("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (\"" . $_POST['codigo'] . "\",\"" . $_POST['descripcion'] . "\")");//Ejecutamos la consulta
        $registros=$miDB->exec($consulta);//Devuelve 1 si se ha creado el registro y 0 si no se ha creado.
        if($registros==1){
            echo "Se ha creado el registro.";
        }else{
            echo "No se ha podido crear el registro.";
        }
        header('Location:mtoDepartamentos.php');
    }catch (PDOException $e){
        echo $e->getMessage();
        unset($miDB);
        ?>
        <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post"><!--Mostramos siempre el formulario-->
            <legend>
                <h2>Nuevo Registro:</h2>
            </legend>
            <label for="codigo">Código</label>
            <input type="text" name="codigo" <?php if (isset($_POST['codigo']) && empty($errores['codigo'])) {
                echo 'value="', $_POST['codigo'], '"';
            } ?> >
            <?php echo $errores['codigo']; ?>
            <br><br>
            <label for="descripcion">Descripcion</label>
            <input type="text"
                   name="descripcion" <?php if (isset($_POST['descripcion']) && empty($errores['descripcion'])) {
                echo 'value="', $_POST['descripcion'], '"';
            } ?> >
            <?php echo $errores['descripcion']; ?>
            <br><br>
            <input id="aceptar" type="submit" value="Aceptar" name="Enviar"/>
            <input id="cancelar" type="submit" value="Cancelar" name="Cancelar"/>
        </form>
        <?php
    }
    exit();
}
?>
<footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>