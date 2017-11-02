<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 22</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>	
        <?php
        $error = false;
        $nombre = "";
        $apellidos = "";
        $errorNombre = "";
        $errorApellidos = "";
        $genero = "";
        $errorGenero = "";
        $provincia = "";
        $errorProvincia = "";
        $fechaNacimiento = "";
        $errorFechaNacimiento = "";
        $hermanos = "";
        $errorHermanos = "";
        $altura = "";
        $errorAltura = "";
        $telefono = "";
        $errorTelefono = "";
        $email = "";
        $errorEmail = "";
        $contraseña = "";
        $errorContraseña = "";
        $sugerencia = "";
        $errorSugerencia = "";
        if (isset($_POST['enviar'])) {
            if (empty($_POST['nombre'])) {
                $error = true;
                $errorNombre = "Debe introducir el nombre.";
            } else {
                $nombre = $_POST['nombre'];
            }
            if (empty($_POST['apellidos'])) {
                $error = true;
                $errorApellidos = "Debe introducir los apellidos.";
            } else {
                $apellidos = $_POST['apellidos'];
            }
            if (empty($_POST['genero'])) {
                $error = true;
                $errorGenero = "Debe seleccionar el sexo.";
            } else {
                $genero = $_POST['genero'];
            }
            if (empty($_POST['provincia'])) {
                $error = true;
                $errorProvincia = "Debe seleccionar la provincia.";
            } else {
                $provincia = $_POST['provincia'];
            }
            if (empty($_POST['nacimiento'])) {
                $error = true;
                $errorFechaNacimiento = "Debe seleccionar una fecha de nacimiento.";
            } else {
                $fechaNacimiento = $_POST['nacimiento'];
            }
            if (empty($_POST['hermanos'])) {
                $error = true;
                $errorHermanos = "Debe señalar la cantidad de hermanos";
            } else {
                $hermanos = $_POST['hermanos'];
            }
            if (empty($_POST['altura'])) {
                $error = true;
                $errorAltura = "Debe seleccionar su altura.";
            } else {
                $altura = $_POST['altura'];
            }
            if (empty($_POST['telefono'])) {
                $error = true;
            } else {
                $telefono = $_POST['telefono'];
            }
            if (empty($_POST['email'])) {
                $error = true;
                $errorEmail = "Debe introducir su dirección de correo.";
            } else {
                $email = $_POST['email'];
            }
            if (empty($_POST['contraseña'])) {
                $error = true;
                $errorContraseña = "Debe introducir la contraseña.";
            } else {
                $contraseña = $_POST['contraseña'];
            }
            if (empty($_POST['sugerencias'])) {
                $error = true;
                $errorSugerencia = "Debe señalar sus sugerencias.";
            } else {
                $sugerencia = $_POST['sugerencias'];
            }
        }
        if (!isset($_POST['enviar']) || $error) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <legend>
                    <h1>Formulario de Registro:</h1>
                </legend>
                <h2>Datos personales:</h2>
                <label for="cortesia">Sexo</label>
                <div>
                    <input type="radio" id="genero1" name="genero" value="Hombre">Sr.<br/> 
                    <input type="radio" id="genero2" name="genero" value="Mujer">Sra.<br/> 
                </div>
                <?php
                echo $errorGenero;
                ?>
                </br></br> 
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                <?php
                echo $errorNombre;
                ?>
                </br></br>
                <label for="apellidos">Apellidos</label> 
                <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos">
                <?php
                echo $errorApellidos;
                ?>
                </br></br> 
                <label for="nacimiento">Fecha de Nacimiento</label>
                <input type="date" id="nacimiento" name="nacimiento"/>
                <?php
                echo $errorFechaNacimiento;
                ?>
                </br></br>
                <select name="provincia">
                    <option value="Provincia">Provincia</option>
                    <option value="Ávila">Ávila</option>
                    <option value="Burgos">Burgos</option>
                    <option value="León">León</option>
                    <option value="Palencia">Palencia</option>
                    <option value="Salamanca">Salamanca</option>
                    <option value="Segovia">Segovia</option>
                    <option value="Soria">Soria</option>
                    <option value="Valladolid">Valladolid</option>
                    <option value="Zamora">Zamora</option>	
                </select>
                <?php
                echo $errorProvincia;
                ?>
                </br></br>
                <label for="email">Número de hermanos</label>
                <input type="number" id="hermanos" name="hermanos" min="0" placeholder="0"/> 
                <?php
                echo $errorHermanos;
                ?>
                </br></br> 
                <label for="altura">Altura</label>
                <input type="range" name="altura" min="0" max="299" step="1" value="150">
                <?php
                echo $errorAltura;
                ?>
                </br></br> 
                <label for="email">Correo electronico</label>
                <input type="email" id="email" name="email" placeholder="direccion@correo.com"/> 
                <?php
                echo $errorEmail;
                ?>
                </br></br> 
                <label for="email">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="contraseña"/> 
                <?php
                echo $errorContraseña;
                ?>
                </br></br> 
                <label for="telefono">Número de teléfono</label> 
                <input type="tel" id="telefono" name="telefono"/>
                <?php
                echo $errorTelefono;
                ?>
                </br></br>
                <label for="telefono">Buzón de sugerencias</label> </br>
                <textarea name="sugerencias" rows="15" cols="100" placeholder="Introduzca aquí sus sugerencias"></textarea>
                <br>
                <?php
                    echo $errorSugerencia;
                ?>
                </br></br>
                <input type="submit" name="enviar" value="Enviar">
            </form>
            <?php
        } else {
            echo ($nombre . '<br>');
            echo ($apellidos . '<br>');
            echo ($genero . '<br>');
            echo ($fechaNacimiento . '<br>');
            echo ($provincia . '<br>');
            echo ($altura . '<br>');
            echo ($telefono . '<br>');
            echo ($email . '<br>');
            echo ($contraseña . '<br>');
            echo ($sugerencia);
        }
        ?>
    </body>
</html>
