<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 23</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>	
        <?php
		//Importamos la libreria en la que se encuentran las funciones de validación.
		require "libreriaValidacion.php";
		//Definimos las variables con los valores máximos y mínimos de los campos.
		define("MINHERMANOS", 0);
		define("MAXHERMANOS", 99);
		define("MINALTURA",0);
		define("MAXALTURA",300);
		define("MINCARACTERES", 2);
		define("MAXCARACTERES", 500);
		//Función que nos va a dar el error según la función.
		$valida = 0;
		//En caso de que haya error se pondrá a verdadero.
        $error = false;
		//Array que va a almacenar las respuestas
		$campos = array(
            'nombre' => '',
            'apellidos' => '',
            'genero' => '',
			'provincia' => '',
			'fechaNacimiento' => '',
			'hermanos' => '',
			'altura' => '',
            'telefono' => '',
			'email' => '',
			'contraseña' => '',
            'sugerencias' => ''
        );
		//Array que va a almacenar los errores
        $erroresCampos = array(
            'nombre' => '',
            'apellidos' => '',
            'genero' => '',
            'provincia' => '',
            'fechaNacimiento' => '',
            'hermanos' => '',
            'altura' => '',
            'telefono' => '',
            'email' => '',
            'contraseña' => '',
            'sugerencia' => ''
        );
		//Array que va a almacenar datos de radio button
		$sexo = array(
            'Hombre' => '',
            'Mujer' => ''
        );
		//Realizamos la comprobación de errores, en caso de que haya un error se pondrá a verdadero y no almacenará los datos de dicho campo.
        if (filter_has_var(INPUT_POST,'enviar')) {
			$valida=validarCadenaAlfabetica($_POST['nombre']);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['nombre'] = "Error en el nombre.";
            } else {
                $campos['nombre'] = $_POST['nombre'];
            }
			$valida=validarCadenaAlfabetica($_POST['apellidos']);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['apellidos'] = "Error en los apellidos.";
            } else {
                $campos['apellidos'] = $_POST['apellidos'];
            }
            if(empty($_POST['genero'])){	
				$erroresCampos['genero'] = "Debe señalar el genero";
				$error = true;
			}
			else{
				$campos['genero'] = $_POST['genero'];
				$sexo[$campos['genero']] = 'checked';//En caso de checkbox o radio button pondremos checked para que quede señalado 
			}
            if (empty($_POST['provincia'])) {
                $error = true;
                $erroresCampos['provincia'] = "Debe seleccionar la provincia.";
            } else {
                $campos['provincia'] = $_POST['provincia'];
            }
            if (empty($_POST['nacimiento'])) {
                $error = true;
                $erroresCampos['nacimiento'] = "Debe seleccionar una fecha de nacimiento.";
            } else {
                $campos['fechaNacimiento'] = $_POST['nacimiento'];
            }
			$valida=validarEntero($_POST['hermanos'],MINHERMANOS,MAXHERMANOS);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['hermanos'] = "Error en la cantidad de hermanos";
            } else {
                $campos['hermanos'] = $_POST['hermanos'];
            }
			$valida=validarReal($_POST['altura'],MINALTURA,MAXALTURA);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['altura'] = "Error en la altura.";
            } else {
                $campos['altura'] = $_POST['altura'];
            }
			$valida=validarTelefono($_POST['telefono']);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['telefono'] = "Debe introducir su telefono";
            } else {
                $campos['telefono'] = $_POST['telefono'];
            }
			$valida=validarEmail($_POST['email']);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['email'] = "Error en el email.";
            } else {
                $campos['email'] = $_POST['email'];
            }
			$valida=validarCadenaAlfanumerica($_POST['contraseña'],MINCARACTERES,MAXCARACTERES);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['contraseña'] = "Error en la contraseña.";
            } else {
                $campos['contraseña'] = $_POST['contraseña'];
            }
			$valida=validarCadenaAlfanumerica($_POST['sugerencias'],MINCARACTERES,MAXCARACTERES);
            if ($valida!=0) {
                $error = true;
                $erroresCampos['sugerencia'] = "Error en sugerencias.";
            } else {
                $campos['sugerencias'] = $_POST['sugerencias'];
            }
        }
		//En el caso de que no se haya procesado el formulario o que haya un error en el mismo volverá a mostrarlo
        if (!isset($_POST['enviar']) || $error) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <legend>
                    <h1>Formulario de Registro:</h1>
                </legend>
                <h2>Datos personales:</h2>
                <label for="cortesia">Sexo</label>
                <div>
                    <input type="radio" id="genero1" name="genero" value="Hombre" <?php echo $sexo['Hombre'];?>>Sr.<br/> 
                    <input type="radio" id="genero2" name="genero" value="Mujer" <?php echo $sexo['Mujer'];?>>Sra.<br/> 
                </div>
				<?php
					echo $erroresCampos['genero'];
				?>
                </br></br> 
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $campos['nombre']; ?>" placeholder="Nombre">
                <?php
                    echo $erroresCampos['nombre'];
                ?>
                </br></br>
                <label for="apellidos">Apellidos</label> 
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $campos['apellidos']; ?>" placeholder="Apellidos">
                <?php
                    echo $erroresCampos['apellidos'];
                ?>
                </br></br> 
                <label for="nacimiento">Fecha de Nacimiento</label>
                <input type="date" id="nacimiento" name="nacimiento" value="<?php echo $campos['fechaNacimiento']; ?>"/>
                <?php
                    echo $erroresCampos['fechaNacimiento'];
                ?>
                </br></br>
                <select name="provincia" value="<?php echo $campos['provincia']; ?>">
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
                    echo $erroresCampos['provincia'];
                ?>
                </br></br>
                <label for="email">Número de hermanos</label>
                <input type="number" id="hermanos" name="hermanos" value="<?php echo $campos['hermanos']; ?>"min="0" placeholder="0"/> 
                <?php
                    echo $erroresCampos['hermanos']
                ?>
                </br></br> 
                <label for="altura">Altura</label>
                <input type="range" name="altura" min="0" max="299" step="1" value="<?php echo $campos['altura']; ?>">
                <?php
                    echo $erroresCampos['altura'];
                ?>
                </br></br> 
                <label for="email">Correo electronico</label>
                <input type="email" id="email" name="email" value="<?php echo $campos['email']; ?>" placeholder="direccion@correo.com"/> 
                <?php
                    echo $erroresCampos['email'];
                ?>
                </br></br> 
                <label for="email">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña" value="<?php echo $campos['contraseña']; ?>" placeholder="contraseña"/> 
                <?php
                    echo $erroresCampos['contraseña'];
                ?>
                </br></br> 
                <label for="telefono">Número de teléfono</label> 
                <input type="tel" id="telefono" name="telefono" value="<?php echo $campos['telefono']; ?>"/>
                <?php
                    echo $erroresCampos['telefono']
                ?>
                </br></br>
                <label for="telefono">Buzón de sugerencias</label> </br>
                <textarea name="sugerencias" rows="15" cols="100" value="<?php echo $campos['sugerencias']; ?>" placeholder="Introduzca aquí sus sugerencias"></textarea>
                <br>
                <?php
                    echo $erroresCampos['sugerencia'];
                ?>
                </br></br>
                <input type="submit" name="enviar" value="Enviar">
            </form>
            <?php
			//En caso de que no haya errores recorreremos el array con las respuestas para que devuelva los valores introducidos
        } else {
            foreach ($campos as $clave => $valor) {
                    if (is_array($valor)) {
                        foreach ($valor as $campo) {
                            echo "$campo </br>";
                        }
                    } else {
                        echo $clave . ": " . $valor . "<br />";
                    }
                }
                echo "<br />";
        }
        ?>
    </body>
</html>

