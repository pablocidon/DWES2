<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta</title>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <!--Archivo: encuesta.php
        Autor: Pablo Cidón.
        Creado: 23/11/2017
        Modificado: 27/11/2017 -->
</head>
<body>
<?php
include "librerias/confUsuarios.php";
include "librerias/LibreriaValidacion.php";
$correcto=true;
$datos=Array(
    'nombre'=>'',
    'apellidos'=>'',
    'dni'=>'',
    'fechaNacimiento'=>'',
    'satisfaccion'=>'',
    'valoracion'=>'',
    'sugerencias'=>''
);
$errores=Array(
    'nombre'=>'',
    'apellidos'=>'',
    'dni'=>'',
    'fechaNacimiento'=>'',
    'satisfaccion'=>'',
    'valoracion'=>'',
    'sugerencias'=>''
);
try {
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//la conexión.
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
    $ip =  $_SERVER['REMOTE_ADDR'];
    if (isset($_POST['Cancelar'])) {
        header('Location:index.html');
    }
    if (filter_has_var(INPUT_POST, 'Enviar')) {
        $errores['nombre'] = comprobarTexto($_POST['nombre'], 20, 0, 1);//Comprobamos que se ha introducido una cadena
        $errores['apellidos'] = comprobarTexto($_POST['apellidos'], 100, 0, 1);//Comprobamos que se ha introducido una cadena
        if ($errores['dni'] = validacionDNI($_POST['dni']) == null) {//Validamos el DNI
            $comprobacion = $miDB->query("SELECT * FROM Campos WHERE DNI = \"" . $_POST['dni'] . "\"");//Consultamos si existe
            $resultado = $comprobacion->fetchColumn(0);
            if ($resultado) {//En caso de exista mostraremos un mensaje de error.
                $errores['dni'] = "Ya existe este DNI";
                $correcto = false;
            }
        }
        $errores['fechaNacimiento'] = validarFecha($_POST['nacimiento'],1);//Comprobamos si se ha introducido una fecha
        $errores['satisfaccion'] = comprobarEntero($_POST['satisfaccion'],1);//Comprobamos que se haya introducido un entero
        $errores['valoracion'] = comprobarTexto($_POST['valoracion'],50,0,0);//Comprobamos que sea un texto
        $errores['sugerencias'] = comprobarAlfaNumerico($_POST['sugerencias'],250,0,0);//Comptrobamos que sea un texto que puede contener algún número
        foreach ($errores as $valor) {  //recorremos el array de errores
            if ($valor != null) {
                $correcto = false;
            }
        }
    }
    if(!filter_has_var(INPUT_POST,'Enviar')||$correcto=false) {//Si no se ha enviado o hay algún error mostramos la encuesta
        ?>
        <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!--Mostramos siempre el formulario-->
            <legend>
                <h1>ENCUESTA INDIVIDUAL DE VALORACIÓN DE LA ASIGNATURA DESARROLLO DE
                    APLICACIONES WEB EN ENTORNO SERVIDOR</h1>
            </legend>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre"
                   placeholder="Nombre" <?php if (isset($_POST['nombre']) && empty($mensajeError['nombre'])) {
                echo 'value="', $_POST['nombre'], '"';
            } ?> >(*)
            <span class="error"><?php echo $errores['nombre']; ?></span>
            <br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos"
                   placeholder="Apellidos" <?php if (isset($_POST['apellidos']) && empty($mensajeError['apellidos'])) {
                echo 'value="', $_POST['apellidos'], '"';
            } ?> >(*)
            <span class="error"><?php echo $errores['apellidos']; ?></span>
            <br><br>
            <label for="dni">DNI:</label>
            <input type="text" name="dni"
                   placeholder="DNI" <?php if (isset($_POST['dni']) && empty($errores['dni'])) {
                echo 'value="', $_POST['apellidos'], '"';
            } ?> >(*)
            <span class="error"><?php echo $errores['dni']; ?></span>
            <br><br>
            <label for="nacimento">Fecha de Nacimiento:</label>
            <input type="date"
                   name="nacimiento" <?php if (isset($_POST['nacimiento']) && empty($errores['fechaNacimiento'])) {
                echo 'value="', $_POST['nacimiento'], '"';
            } ?> >(*)
            <span class="error"><?php echo $errores['fechaNacimiento']; ?></span>
            <br><br>
            <label for="satisfaccion">Grado de Satisfacción:</label>
            <input type="number" min="0" max="10" step="1"
                   name="satisfaccion"<?php if (isset($_POST['satisfaccion']) && empty($errores['satisfaccion'])) {
                echo 'value="', $_POST['satisfaccion'], '"';
            } ?> >(*)
            <span class="error"><?php echo $errores['satisfaccion']; ?></span>
            <br><br>
            <label for="valoracion">Valoración de los materiales:</label><br>
            <input type="radio" name="valoracion" value="Malos" <?php echo $datos['valoracion']; ?>>Malos<br/>
            <input type="radio" name="valoracion" value="Muy Mejorables" <?php echo $datos['valoracion']; ?>>Muy
            Mejorables<br/>
            <input type="radio" name="valoracion"
                   value="Regulares" <?php echo $datos['valoracion']; ?>>Regulares<br/>
            <input type="radio" name="valoracion" value="Buenos" <?php echo $datos['valoracion']; ?>>Buenos<br/>
            <input type="radio" name="valoracion" value="Muy Buenos" <?php echo $datos['valoracion']; ?>>Muy
            Buenos<br/>
            <span class="error"><?php echo $errores['valoracion']; ?></span>
            <br><br>
            <label for="sugerencias">Opiniones y sugerencias:</label><br>
            <textarea name="sugerencias" rows="10" cols="50" value="<?php echo $datos['sugerencias']; ?>"
                      placeholder="Introduzca aquí sus sugerencias"></textarea>
            <span class="error"><?php echo $errores['satisfaccion']; ?></span>
            <br>
            <label for="obligatorio">(*) Campos Obligatorios</label>
            <br>
            <input id="enviar" type="submit" value="Enviar" name="Enviar"/>
            <input id="cancelar" type="submit" value="Cancelar" name="Cancelar"/>
        </form>
    <?php
    }else{
    $consulta = ("INSERT INTO Campos  VALUES (\"" . $_POST['dni'] . "\",\"" . $_POST['nombre'] .
        "\",\"" . $_POST['apellidos'] . "\",\"" . $_POST['nacimiento'] . "\",\"" . $_POST['satisfaccion'] . "\",\"" . $_POST['valoracion'] .
        "\",\"" . $_POST['sugerencias'] . "\",\"" . $ip ."\" )");//Ejecutamos la consulta
    $registros = $miDB->exec($consulta);//Devuelve 1 si se ha creado el registro y 0 si no se ha creado.
    if ($registros == 1) {//Si se encuentra un registro, mostramos si se ha creado o no
    ?> <script>alert(<?php echo "Encuesta Realizada.";?>)</script>
    <?php
    } else {
    ?>    <script>alert(<?php echo "No se ha podido realizar la encuesta.";?>)</script>
    <?php }
        header('Location:index.html');//Volvemos a la página de inicio
    }
}catch (PDOException $e){
    echo $e->getMessage();//Si se produce un error muestra un mensaje
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