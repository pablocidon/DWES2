<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 3</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    </head>
    <body>
    <?php
    require 'LibreriaValidacion.php';
    include "../../confUsuarios.php";
    $miDB = new mysqli();
    $miDB->connect(HOST, USER, PASSWORD, DATABASE);
    $error = $miDB->connect_errno;
    if($miDB->connect_errno){
        echo "Error al conectarse a la base de datos<br/>";
        echo "Codigo de error:" .$miDB->connect_errno;
    }else{
        $entradaOK = true;
        $datos = array();
        $errores = array();
        $valido = 0;
        $correcto=true;
        $datos = array(
            'codigo' => '',
            'descripcion' => '',
            'fecha' => ''
        );
        $errores = array(
            'codigo' => '',
            'descripcion' => '',
            'fecha' => ''
        );
        $mensajeError = array(
            " ",
            "<strong>No ha introducido ningun valor</strong><br />",
            "<strong>El valor introducido no es valido</strong><br />",
            "<strong>Tamaño minimo no valido</strong><br />",
            "<strong>Tamaño maximo no valido</strong><br />"
        );
        if (filter_has_var(INPUT_POST,'registrar')) {
            $valido=comprobarAlfaNumerico($_POST['codigo'], 3, 3, 1);
            if($valido!=0){
                $errores['codigo']=$mensajeError[$valido];
                $correcto=false;
            }else{
                $datos['codigo']=$_POST['codigo'];
            }
            $valido=comprobarTexto($_POST['descripcion'], 255, 0, 1);
            if($valido!=0){
                $errores['descripcion']=$mensajeError[$valido];
                $correcto=false;
            }else{
                $datos['descripcion']=$_POST['descripcion'];
            }
            $valido=validarFecha($_POST['fecha'], 1);
            if($valido!=0){
                $errores['fecha']=$mensajeError[$valido];
                $correcto=false;
            }else{
                $datos['fecha']=$_POST['fecha'];
            }
        }
    }


    if (!isset($_POST['enviar']) || !$correcto) {
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
            <label for="fecha">Fecha de baja:</label>
            <input type="date" name="fecha" placeholder="Fecha"<?php
                   if (isset($_POST['fecha']) && empty($mensajeError['fecha'])) {
                       echo 'value="', $_POST['fecha'], '"';
                   }
            ?> />
            <span class="error"><?php echo $errores["fecha"]; ?></span>
            <br><br>
            <input id="calculo" type="submit" value="Registrar" name="registrar"/>
        </form>
        <?php
            } else {
                $datos = array(
                    'codigo' => $_POST['codigo'],
                    'descripcion' => $_POST['descripcion'],
                    'fecha' => $_POST['fecha']
                );
            }
            $miDB = new mysqli();
            $miDB->connect("localhost", "DAW211", "paso", "DAW211_DBdepartamentos");
            $error = $miDB->connect_errno;
            $consulta = $miDB->query("INSERT INTO Departamento VALUES (?,?,?)");
            $miDB->close();
        ?>
    </body>
</html>

