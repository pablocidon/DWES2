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
    <a href="mtoDepartamentos.php"><button type="button" class="abierto"><img src="images/inicio.png" alt="inicio">Inicio</button></a>
    <a href="altaDepartamento.php"><button type="button" disabled><img src="images/nuevo.png" alt="nuevo">Nuevo</button></a>
    <a href="modificacionDepartamento.php"><button type="button" disabled><img src="images/editar.png" alt="editar">Editar</button></a>
    <a href="borradoDepartamento.php"><button type="button" disabled><img src="images/borrar.png" alt="borrar">Borrar</button></a>
    <a href="importaDepartamento.php"><button type="button" disabled><img src="images/importar.png" alt="importar">Importar</button></a>
    <a href="exportaDepartamento.php"><button type="button" disabled><img src="images/exportar.png" alt="exportar">Exportar</button></a>
    <a href="../index.html"><button type="button"><img src="images/salir.png" alt="exportar">Salir</button></a>
</nav>
<br><br>
<?php
include 'Librerias/confUsuarios.php';
include 'Librerias/LibreriaValidacion.php';
$entradaOK = true;
$valido = 0;
$correcto = true;
$departamento = array( //aray qye almacena los distintos departamentos
    'cod_Departamento'=>'',
    'desc_Departamento'=>'',
);

$errores = array(
    'desc_Departamento'=>'',
);

if(isset($_POST['Buscar'])) { //comprobamos si se ha pulsado buscar

    $errores['desc_Departamento']=validarCadenaAlfabetica($_POST['desc_Departamento'],250,0,1); //comprobamos si hay errores

    foreach($errores as $valor){  //recorremos el array de errores
        if($valor!=null){
            $entradaOK=false;
        }
    }

}
try { //intentamos buscar

?>
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="desc_Departamento">Descripcion</label>
    <input type="text" name="desc_Departamento" <?php if(isset($_POST['desc_Departamento']) && empty($mensajeError['desc_Departamento'])){ echo 'value="',$_POST['desc_Departamento'],'"';}?> >
    <input id="buscar" type="submit" value="Buscar" name="Buscar"/>
    <?php echo $errores["desc_Departamento"];?>
</form>
<?php
$conexion = new PDO(DATOSCONEXION, USER, PASSWORD);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //errores propios de la base de datos
if (!isset($_POST['desc_Departamento'])){
    $busqueda="'%%'";
}else{
    $busqueda="'%".$_POST['desc_Departamento']."%'";
}

?>



<?php
//creamos la consulta
$consulta = "SELECT * from Departamento WHERE DescDepartamento LIKE ".$busqueda;
$resultado = $conexion->query($consulta);

?>




<table class="resultados">
    <tbody>
    <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Descripcion</th>
    </tr>
    <?php

    //Recorremos con un bucle los registros recibidos
    while ($departamento = $resultado->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>".$departamento->CodDepartamento."</td>";
        echo "<td>".$departamento->DescDepartamento."</td>";
        //echo "<td id='logos'><img src='iconos/editar2.png' height=20 width=20 style='margin-right: 5px; margin-left: 5px;'> <a href='borrar.php?cod_Departamento=$departamento->cod_Departamento'><img src='iconos/borrar.png' height=20 width=20 style='margin-right: 5px;'></a> </td>";
    }
    if($resultado->rowCount()==0){ //si no hay ningun registro mostramos un mensaje de error
        echo "<tr><td colspan='4'></td></tr>";
    }
    echo "</tbody></table>";
    unset($conexion);

    } catch(PDOException $errorPDO) {

        echo "<pre>".print_r($errorPDO,true)."</pre>";
        exit();
    }

    ?>
    <footer>
    <p id="pie">Pablo Cidon Curso 2017-2018</p>
</footer>
</body>
</html>