<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 3</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>
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
            <label for="fecha">Presión Atmosférica:</label>
            <input type="date" name="fecha" placeholder="Fecha"<?php
                   if (isset($_POST['fecha']) && empty($mensajeError['fecha'])) {
                       echo 'value="', $_POST['fecha'], '"';
                   }
            ?> />
            <span class="error"><?php echo $errores["fecha"]; ?></span>
            <br><br>
            <input id="calculo" type="submit" value="Registrar" name="registrar"/>
        </form>
    </body>
</html>

