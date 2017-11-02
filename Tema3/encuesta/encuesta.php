<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
        <title>Encuesta</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
		require "libreriaValidacion.php"; 
        define("LONGITUD", 3);
		define("MINEDAD", 18);
		define("MAXEDAD", 99);
		define("MINCARACTERES", 2);
		define("MAXCARACTERES", 500);
        $error = false;
        $encuesta = array();
        $erroresCampos = array();
		$valida = 0;
        for ($i = 0; $i < LONGITUD; $i++) {
            $encuesta[$i] = array(
                'nombre' => '',
                'apellidos' => '',
                'edad' => '',
                'genero' => '',
                'telefono' => '',
				'redsocial' => '',
				'correo' => '',
				'contraseña' => '',
                'sugerencias' => ''
            );
            $erroresCampos[$i] = array(
                'nombre' => '',
                'apellidos' => '',
                'edad' => '',
                'genero' => '',
                'telefono' => '',
				'redsocial' => '',
				'correo' => '',
				'contraseña' => '',
                'sugerencias' => ''
            );
            $sexo[$i] = array(
                'Hombre' => '',
                'Mujer' => ''
            );
			$redsocial[$i] = array(
				'Facebook' => '',
				'Twitter' => '',
				'Instagram' => ''
			);
			$arrayErrores = array(
				" ", 
				"<strong>No ha introducido ningun valor</strong><br />",
				"<strong>El valor introducido no es valido</strong><br />",
				"<strong>Tamaño minimo no valido</strong><br />",
				"<strong>Tamaño maximo no valido</strong><br />"
			); 
        }
        if (filter_has_var(INPUT_POST,'enviar')){
			for($i = 0;$i<LONGITUD;$i++){
				$valida=validarCadenaAlfabetica($_POST['nombre'][$i]);
				if($valida!=0){
					$erroresCampos[$i]['nombre'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['nombre'] = $_POST['nombre'][$i];
				}
				$valida=validarCadenaAlfabetica($_POST['apellidos'][$i]);
				if($valida!=0){
					$erroresCampos[$i]['apellidos'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['apellidos'] = $_POST['apellidos'][$i];
				}
				$valida=validarEntero($_POST['edad'][$i],MINEDAD,MAXEDAD);
				if($valida!=0){
					$erroresCampos[$i]['edad'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['edad'] = $_POST['edad'][$i];
				}
				
				if(empty($_POST['genero'.$i][$i])){
					
					$erroresCampos[$i]['genero'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['genero'] = $_POST['genero'.$i];
					$sexo[$i][$encuesta[$i]['genero']] = 'checked'; 
				}
				$valida=validarTelefono($_POST['telefono'][$i]);
				if($valida!=0){	
					$erroresCampos[$i]['telefono'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['telefono'] = $_POST['telefono'][$i];
				}
				if(empty($_POST['redsocial'.$i][$i])){
					$erroresCampos[$i]['redsocial'] = $arrayErrores[1];
					$error = true;
				}
				else{
					$encuesta[$i]['redsocial'] = $_POST['redsocial'.$i];
					$redsocial[$i][$encuesta[$i]['redsocial']] = 'checked'; 
				}
				$valida=validarEmail($_POST['correo'][$i]);
				if($valida!=0){	
					$erroresCampos[$i]['correo'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['correo'] = $_POST['correo'][$i];
				}
				$valida=validarCadenaAlfanumerica($_POST['contraseña'][$i],MINCARACTERES,MAXCARACTERES);
				if($valida!=0){	
					$erroresCampos[$i]['contraseña'] = $arrayErrores[$i];
					$error = true;
				}
				else{
					$encuesta[$i]['contraseña'] = $_POST['contraseña'][$i];
				}
				$valida=validarCadenaAlfanumerica($_POST['sugerencias'][$i],MINCARACTERES,MAXCARACTERES);
				if($valida!=0){
					$erroresCampos[$i]['sugerencias'] = $arrayErrores[$valida];
					$error = true;
				}
				else{
					$encuesta[$i]['sugerencias'] = $_POST['sugerencias'][$i];
				}
			}
        }
        if (!isset($_POST['enviar']) || $error) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <legend>
                    <h1>Encuesta:</h1>
                </legend>
                <div class="left">
                    <label for="nombre[0]">Nombre</label>
                    <input type="text" id="nombre1" name="nombre[0]" value="<?php echo $encuesta[0]['nombre']; ?>" placeholder="Nombre">
                    <span>
						<?php
							echo $erroresCampos[0]['nombre'];
						?>
					</span>
                    </br></br>
                    <label for="apellidos[0]">Apellidos</label> 
                    <input type="text" id="apellidos1" name="apellidos[0]" value="<?php echo $encuesta[0]['apellidos']; ?>" placeholder="Apellidos">
                    <span>
						<?php
							echo $erroresCampos[0]['apellidos'];
						?>
					</span>
                    </br></br> 				
                    <label for="edad[0]">Edad</label> 
                    <input type="text" id="edad1" name="edad[0]" value="<?php echo $encuesta[0]['edad']; ?>" min="18" placeholder="Edad">
                    <span>
						<?php
							echo $erroresCampos[0]['edad'];
						?>
					</span>
                    </br></br>
                    <label for="cortesia0">Sexo</label>
                    <div>
                        <input type="radio" id="genero1" name="genero0" value="Hombre" <?php echo $sexo[0]['Hombre'];?>>Sr.<br/> 
                        <input type="radio" id="genero2" name="genero0" value="Mujer" <?php echo $sexo[0]['Mujer'];?>>Sra.<br/> 
                    </div>
                    <span>
						<?php
							echo $erroresCampos[0]['genero'];
						?>
					</span>
                    </br></br>
                    <label for="telefono[0]">Número de teléfono</label> 
                    <input type="tel" id="telefono" name="telefono[0]" value="<?php echo $encuesta[0]['telefono']; ?>"/>
                    <span>
						<?php
							echo $erroresCampos[0]['telefono'];
						?>
					</span>
                    </br></br>
					<label for="redsocial[0]">Redes sociales</label><br/> 
					<input type="checkbox" name="redsocial0" value="Facebook" <?php echo $redsocial[0]['Facebook'];?>>Facebook<br/>
					<input type="checkbox" name="redsocial0" value="Twitter" <?php echo $redsocial[0]['Twitter'];?>>Twitter<br/>
					<input type="checkbox" name="redsocial0" value="Instagram" <?php echo $redsocial[0]['Instagram'];?>>Instagram<br/>					
                    <span>
						<?php
							echo $erroresCampos[0]['redsocial'];
						?>
					</span>
                    </br></br>
					<label for="correo[0]">Dirección de correo</label> 
                    <input type="text" id="correo1" name="correo[0]" value="<?php echo $encuesta[0]['correo']; ?>" placeholder="Correo">
                    <span>
						<?php
							echo $erroresCampos[0]['correo'];
						?>
					</span>
                    </br></br>
					<label for="contraseña[0]">Contraseña</label> 
                    <input type="password" id="contraseña1" name="contraseña[0]" value="<?php echo $encuesta[0]['contraseña']; ?>" placeholder="Contraseña">
                   <span>
						<?php
							echo $erroresCampos[0]['contraseña'];
						?>
					</span>
                    </br></br>
					<label for="sugerencias[0]">Buzón de sugerencias</label> </br>
					<textarea name="sugerencias[0]" rows="10" cols="50" value="<?php echo $encuesta[0]['sugerencias']; ?>" placeholder="Introduzca aquí sus sugerencias"></textarea>
					<br>
					<span>
						<?php
							echo $erroresCampos[0]['sugerencias'];
						?>
					</span>
					</br></br>						
                </div>
                <div class="center">
                    <label for="nombre[1]">Nombre</label>
                    <input type="text" id="nombre2" name="nombre[1]" value="<?php echo $encuesta[1]['nombre']; ?>" placeholder="Nombre">
                    <span>
						<?php
							echo $erroresCampos[1]['nombre'];
						?>
					</span>
                    </br></br>
                    <label for="apellidos[1]">Apellidos</label> 
                    <input type="text" id="apellidos2" name="apellidos[1]" value="<?php echo $encuesta[1]['apellidos']; ?>" placeholder="Apellidos">
                    <span>
						<?php
							echo $erroresCampos[1]['apellidos'];
						?>
					</span>
                    </br></br>
                    <label for="edad[1]">Edad</label> 
                    <input type="text" id="edad2" name="edad[1]" value="<?php echo $encuesta[1]['edad']; ?>" min="18" placeholder="Edad">
                    <span>
						<?php
							echo $erroresCampos[1]['edad'];
						?>
					</span>
                    </br></br>
                    <label for="cortesia1">Sexo</label>
                    <div>
                        <input type="radio" id="genero1" name="genero1" value="Hombre" <?php echo $sexo[1]['Hombre'];?>>Sr.<br/> 
                        <input type="radio" id="genero2" name="genero1" value="Mujer" <?php echo $sexo[1]['Mujer'];?>>Sra.<br/> 
                    </div>
                    <span>
						<?php
							echo $erroresCampos[1]['genero'];
						?>
					</span>
                    </br></br> 
                    <label for="telefono[1]">Número de teléfono</label> 
                    <input type="tel" id="telefono" name="telefono[1]" value="<?php echo $encuesta[1]['telefono']; ?>"/>
                    <span>
						<?php
							echo $erroresCampos[1]['telefono'];
						?>
					</span>
                    </br></br>
					<label for="redsocial[1]">Redes sociales</label><br/> 
					<input type="checkbox" name="redsocial1" value="Facebook" <?php echo $redsocial[1]['Facebook'];?>>Facebook<br/>
					<input type="checkbox" name="redsocial1" value="Twitter" <?php echo $redsocial[1]['Twitter'];?>>Twitter<br/>
					<input type="checkbox" name="redsocial1" value="Instagram" <?php echo $redsocial[1]['Instagram'];?>>Instagram<br/>					
                    <span>
						<?php
							echo $erroresCampos[1]['redsocial'];
						?>
					</span>
                    </br></br>
					<label for="correo[1]">Dirección de correo</label> 
                    <input type="text" id="correo2" name="correo[1]" value="<?php echo $encuesta[1]['correo']; ?>" placeholder="Correo">
                   <span>
						<?php
							echo $erroresCampos[1]['correo'];
						?>
					</span>
                    </br></br>
					<label for="contraseña[1]">Contraseña</label> 
                    <input type="password" id="contraseña2" name="contraseña[1]" value="<?php echo $encuesta[1]['contraseña']; ?>" placeholder="Contraseña">
                    <span>
						<?php
							echo $erroresCampos[1]['contraseña'];
						?>
					</span>
                    </br></br>
					<label for="sugerencias[1]">Buzón de sugerencias</label> </br>
					<textarea name="sugerencias[1]" rows="10" cols="50" value="<?php echo $encuesta[1]['sugerencias']; ?>" placeholder="Introduzca aquí sus sugerencias"></textarea>
					<br>
					<span>
						<?php
							echo $erroresCampos[1]['sugerencias'];
						?>
					</span>
					</br></br>	
                </div>
                <div class="right">
                    <label for="nombre[2]">Nombre</label>
                    <input type="text" id="nombre3" name="nombre[2]" value="<?php echo $encuesta[2]['nombre']; ?>" placeholder="Nombre">
                    <span>
						<?php
							echo $erroresCampos[2]['nombre'];
						?>
					</span>
                    </br></br> 
                    <label for="apellidos[2]">Apellidos</label> 
                    <input type="text" id="apellidos3" name="apellidos[2]" value="<?php echo $encuesta[2]['apellidos']; ?>" placeholder="Apellidos">
                     <span>
						<?php
							echo $erroresCampos[2]['apellidos'];
						?>
					</span>
                    </br></br>
                    <label for="edad[2]">Edad</label> 
                    <input type="text" id="edad3" name="edad[2]" value="<?php echo $encuesta[2]['edad']; ?>" min="18" placeholder="Edad">
                     <span>
						<?php
							echo $erroresCampos[2]['edad'];
						?>
					</span>
                    </br></br>
                    <label for="cortesia2">Sexo</label>
                    <div>
                        <input type="radio" id="genero1" name="genero2" value="Hombre" <?php echo $sexo[2]['Hombre'];?>>Sr.<br/> 
                        <input type="radio" id="genero2" name="genero2" value="Mujer" <?php echo $sexo[2]['Mujer'];?>>Sra.<br/> 
                    </div>
                     <span>
						<?php
							echo $erroresCampos[2]['genero'];
						?>
					</span>
                    </br></br> 
                    <label for="telefono[2]">Número de teléfono</label> 
                    <input type="tel" id="telefono" name="telefono[2]" value="<?php echo $encuesta[2]['telefono']; ?>"/>
                     <span>
						<?php
							echo $erroresCampos[2]['telefono'];
						?>
					</span>
                    </br></br>
					<label for="redsocial[2]">Redes sociales</label><br/> 
					<input type="checkbox" name="redsocial2" value="Facebook" <?php echo $redsocial[2]['Facebook'];?>>Facebook<br/>
					<input type="checkbox" name="redsocial2" value="Twitter" <?php echo $redsocial[2]['Twitter'];?>>Twitter<br/>
					<input type="checkbox" name="redsocial2" value="Instagram" <?php echo $redsocial[2]['Instagram'];?>>Instagram<br/>					
                     <span>
						<?php
							echo $erroresCampos[2]['redsocial'];
						?>
					</span>
                    </br></br>
					<label for="correo[2]">Dirección de correo</label> 
                    <input type="text" id="correo3" name="correo[2]" value="<?php echo $encuesta[2]['correo']; ?>" placeholder="Correo">
                     <span>
						<?php
							echo $erroresCampos[2]['correo'];
						?>
					</span>
                    </br></br>
					<label for="contraseña[2]">Contraseña</label> 
                    <input type="password" id="contraseña1" name="contraseña[2]" value="<?php echo $encuesta[2]['contraseña']; ?>" placeholder="Contraseña">
                     <span>
						<?php
							echo $erroresCampos[2]['contraseña'];
						?>
					</span>
                    </br></br>
					<label for="sugerencias[2]">Buzón de sugerencias</label> </br>
					<textarea name="sugerencias[2]" rows="10" cols="50" value="<?php echo $encuesta[2]['sugerencias']; ?>" placeholder="Introduzca aquí sus sugerencias"></textarea>
					<br>
					 <span>
						<?php
							echo $erroresCampos[2]['sugerencias'];
						?>
					</span>
					</br></br>					
                </div>
                <input type="submit" name="enviar" value="Enviar" id="submit">
            </form>
            <?php
        } else {
            for ($i = 0; $i < LONGITUD; $i++) {
                foreach ($encuesta[$i] as $clave => $valor) {
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
			
			
        }
        ?>
    </body>
</html>