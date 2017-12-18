<?php
/**
* Archivo: encuesta.php
* Autor: Pablo Cidón.
* Creado: 13/12/2017
* Modificado: 18/12/2017
*/
include "ficheros/conexionDB.php";
include "ficheros/LibreriaValidacion.php";
$correcto=true;
$errores = Array(
    'edad'=>'',
    'genero'=>'',
    'categoria'=>'',
    'frecuencia'=>'',
    'cartelera'=>'',
    'opinion'=>''
);
if(isset($_POST['salir'])){//Si pulsamos el botón de salida
    unset($_SESSION['usuario']);//Cerramos la sesión
    header("Location: login.php");//Vamos a la página de login
}
session_start();
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//la conexión.
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Llamamos a las excepciones
    if (filter_has_var(INPUT_POST, 'enviar')){
        $nombre=$_SESSION['usuario'];
        $errores['edad']=comprobarAlfaNumerico($_POST['edad'],20,0,1);
        $errores['genero']=comprobarTexto($_POST['genero'],20,0,1);
        $errores['categoria']=comprobarTexto($_POST['categoria'],20,0,1);
        $errores['frecuencia']=comprobarTexto($_POST['frecuencia'],20,0,1);
        $errores['cartelera']=comprobarTexto($_POST['cartelera'],20,0,1);
        $errores['opinion']=comprobarAlfaNumerico($_POST['opinion'],140,0,1);
        foreach ($errores as $valor) {  //recorremos el array de errores
            if ($valor != null) {
                $correcto = false;
            }
        }
    }
if(!filter_has_var(INPUT_POST,'enviar')||$correcto=false){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>PCB-DWES</title>
</head>
<body>
<header>
    <h1>ENCUESTA SOBRE CINE DE <?php echo strtoupper($_SESSION['usuario']);?></h1>
</header>
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="edad">Edad:</label><br>
    <span class="respuestas">
    Menos de 15 años<input type="radio" name="edad" value="menor de 15" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 15 y 20 años<input type="radio" name="edad" value="entre 15 y 20" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 21 y 25 años<input type="radio" name="edad" value="entre 21 y 25" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 26 y 30 años<input type="radio" name="edad" value="entre 26 y 30" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 31 y 35 años<input type="radio" name="edad" value="entre 31 y 35" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 36 y 40 años<input type="radio" name="edad" value="entre 36 y 40" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 41 y 45 años<input type="radio" name="edad" value="entre 41 y 45" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 46 y 50 años<input type="radio" name="edad" value="entre 46 y 50" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 51 y 55 años<input type="radio" name="edad" value="entre 51 y 55" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Entre 56 y 60 años<input type="radio" name="edad" value="entre 56 y 60" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    Mayor de 60<input type="radio" name="edad" value="mayor de 60" <?php if (isset($_POST['edad']) && empty($errores['edad'])) {
        echo 'value="', $_POST['edad'], '"';
    } ?>><br>
    </span>
    <br><br>


    <label for="sexo">Sexo:</label><br>
    <span class="respuestas">
    Hombre<input type="radio" name="genero" value="hombre" <?php if (isset($_POST['genero']) && empty($errores['genero'])) {
        echo 'value="', $_POST['genero'], '"';
    } ?>><br>
    Mujer<input type="radio" name="genero" value="mujer" <?php if (isset($_POST['genero']) && empty($errores['genero'])) {
        echo 'value="', $_POST['genero'], '"';
    } ?>><br>
        </span>
    <br><br>
    <!--<span class="error"><?php// echo $error;
    ?></span>-->
    <label for="categorias">¿Qué tipo de película le gusta más?</label>
    <select name="categoria" id="categorias">
        <option class="heading" selected>Seleccionar</option>
        <option value="accion">Acción</option>
        <option value="animacion">Animación</option>
        <option value="ciencia ficcion">Ciencia Ficción</option>
        <option value="terror">Terror</option>
        <option value="musical">Músical</option>
        <option value="policiaco">Policíaco</option>
        <option value="drama">Drama</option>
        <option value="comida">Comedia</option>
        <option value="thriller">Thriller</option>
        <option value="western">Wenstern</option>
        <option value="documental">Documental</option>
    </select>
    <br><br>
    <label for="frecuencia">Frecuencia con la que acude al cine:</label><br>
    <span class="respuestas">
    Nunca<input type="radio" name="frecuencia" value="nunca" <?php if (isset($_POST['frecuencia']) && empty($errores['frecuencia'])) {
        echo 'value="', $_POST['frecuencia'], '"';
    } ?>><br>
    Muy Poco<input type="radio" name="frecuencia" value="muy poco" <?php if (isset($_POST['frecuencia']) && empty($errores['frecuencia'])) {
        echo 'value="', $_POST['frecuencia'], '"';
    } ?>><br>
    Poco<input type="radio" name="frecuencia" value="poco" <?php if (isset($_POST['frecuencia']) && empty($errores['frecuencia'])) {
        echo 'value="', $_POST['frecuencia'], '"';
    } ?>><br>
    Ocasionalmente<input type="radio" name="frecuencia" value="ocasionalmente" <?php if (isset($_POST['frecuencia']) && empty($errores['frecuencia'])) {
        echo 'value="', $_POST['frecuencia'], '"';
    } ?>><br>
    Bastante<input type="radio" name="frecuencia" value="bastante" <?php if (isset($_POST['frecuencia']) && empty($errores['frecuencia'])) {
        echo 'value="', $_POST['frecuencia'], '"';
    } ?>><br>
    Mucho<input type="radio" name="frecuencia" value="mucho" <<?php if (isset($_POST['frecuencia']) && empty($errores['frecuencia'])) {
        echo 'value="', $_POST['frecuencia'], '"';
    } ?>><br>
        </span>
    <br><br>
    <label for="cartelera">¿Acude siempre que ve algo interesante en la cartelera?:</label><br>
    <span class="respuestas">
    Sí<input type="radio" name="cartelera" value="si" <?php if (isset($_POST['cartelera']) && empty($errores['cartelera'])) {
        echo 'value="', $_POST['cartelera'], '"';
    } ?>><br>
    A veces<input type="radio" name="cartelera" value="a veces" <?php if (isset($_POST['cartelera']) && empty($errores['cartelera'])) {
        echo 'value="', $_POST['cartelera'], '"';
    } ?>><br>
    No<input type="radio" name="cartelera" value="no" <?php if (isset($_POST['cartelera']) && empty($errores['cartelera'])) {
        echo 'value="', $_POST['cartelera'], '"';
    } ?>><br>
         </span>
    <br><br>
    <label for="opinion">Introduzca una breve opinión respecto al cine:</label><br>
    <span >
    <textarea name="opinion" id="opinion" cols="50" rows="10" <?php if (isset($_POST['opinion']) && empty($errores['opinion'])) {
        echo 'value="', $_POST['opinion'], '"';
    } ?>></textarea>
    </span>
    <br><br>
    <input type="submit" value="Enviar" name="enviar">
    <input type="submit" name="salir" value="Cerrar Sesión">
</form>
<?php
}else {
    $consulta = ("INSERT INTO Resultados (Edad,Genero,Categoria,Frecuencia,Cartelera,Opinion,CodUsuario) VALUES (\"". $_POST['edad'] . "\",\"" . $_POST['genero'] .
        "\",\"" . $_POST['categoria'] . "\",\"" . $_POST['frecuencia'] . "\",\"" . $_POST['cartelera'] . "\",\"" . $_POST['opinion'] .
        "\",\"" . $_SESSION['usuario'] . "\" )");//Ejecutamos la consulta
    $registros = $miDB->exec($consulta);//Devuelve 1 si se ha creado el registro y 0 si no se ha creado.
    if ($registros == 1) {//Si se encuentra un registro, mostramos si se ha creado o no
        echo "Encuesta Realizada";
        ?>
        <script type="text/javascript">
            setTimeout(function(){ window.location="encuesta.php"; }, 3000);
        </script>
<?php
    } else {
       echo "No se ha podido realizar la encuesta.";
    }
}
}catch (PDOException $exception){
    echo $exception->getMessage();//Si se produce un error muestra un mensaje
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
