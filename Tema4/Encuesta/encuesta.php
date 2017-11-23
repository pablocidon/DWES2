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
        Modificado: 23/11/2017 -->
</head>
<body>
<?php
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
?>
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post"><!--Mostramos siempre el formulario-->
    <legend>
        <h1>ENCUESTA INDIVIDUAL DE VALORACIÓN DE LA ASIGNATURA DESARROLLO DE
            APLICACIONES WEB EN ENTORNO SERVIDOR</h1>
    </legend>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" placeholder="Nombre" <?php if(isset($_POST['nombre']) && empty($mensajeError['nombre'])){ echo 'value="',$_POST['nombre'],'"';}?> >
    <span class="error"><?php echo $errores['nombre'];?></span>
    <br><br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" placeholder="Apellidos" <?php if(isset($_POST['apellidos']) && empty($mensajeError['apellidos'])){ echo 'value="',$_POST['apellidos'],'"';}?> >
    <span class="error"><?php echo $errores['apellidos'];?></span>
    <br><br>
    <label for="dni">DNI:</label>
    <input type="text" name="dni" placeholder="DNI" <?php if(isset($_POST['dni']) && empty($errores['dni'])){ echo 'value="',$_POST['apellidos'],'"';}?> >
    <span class="error"><?php echo $errores['dni'];?></span>
    <br><br>
    <label for="nacimento">Fecha de Nacimiento:</label>
    <input type="date" name="nacimiento" <?php if(isset($_POST['nacimiento']) && empty($errores['fechaNacimiento'])){ echo 'value="',$_POST['nacimiento'],'"';}?> >
    <span class="error"><?php echo $errores['fechaNacimiento'];?></span>
    <br><br>
    <label for="satisfaccion">Grado de Satisfacción:</label>
    <input type="number" min="0" max="10" step="1" name="satisfaccion"<?php if(isset($_POST['satisfaccion']) && empty($errores['satisfaccion'])){ echo 'value="',$_POST['satisfaccion'],'"';}?> >
    <span class="error"><?php echo $errores['satisfaccion'];?></span>
    <br><br>
    <label for="valoracion">Valoración de los materiales:</label><br>
    <input type="radio" name="valoracion" value="Malos" <?php echo $datos['valoracion'];?>>Malos<br/>
    <input type="radio" name="valoracion" value="Muy Mejorables" <?php echo $datos['valoracion'];?>>Muy Mejorables<br/>
    <input type="radio" name="valoracion" value="Regulares" <?php echo $datos['valoracion'];?>>Regulares<br/>
    <input type="radio" name="valoracion" value="Buenos" <?php echo $datos['valoracion'];?>>Buenos<br/>
    <input type="radio" name="valoracion" value="Muy Buenos" <?php echo $datos['valoracion'];?>>Muy Buenos<br/>
    <span class="error"><?php echo $errores['valoracion'];?></span>
    <br><br>
    <label for="sugerencias">Opiniones y sugerencias:</label><br>
    <textarea name="sugerencias" rows="10" cols="50" value="<?php echo $datos['sugerencias']; ?>" placeholder="Introduzca aquí sus sugerencias"></textarea>
    <span class="error"><?php echo $errores['satisfaccion'];?></span>
    <br>
    <input id="buscar" type="submit" value="Enviar" name="Enviar"/>
</form>
<?php

?>
<footer>

</footer>
</body>
</html>
