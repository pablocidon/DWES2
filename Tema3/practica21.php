<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Práctica 21</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
	</head>
	<body>	
		<?php
			if(isset($_POST['enviar'])){
				echo ("Nombre y apellidos: ".$_POST['nombre']."  ".$_POST['apellido1']."  ".$_POST['apellido2']); 
				echo('</br>');
				echo ("Género: ".$_POST['genero']);
				echo('</br>');
				echo ("Fecha de nacimiento: ".$_POST['nacimiento']); 
				echo('</br>');
				echo ("Dirección de correo: ".$_POST['email']." Contraseña: ".$_POST['contraseña']); 
				echo('</br>');
				echo ("Teléfono de contacto: ".$_POST['telefono']); 
				echo('</br>');
				echo ("Provincia: ".$_POST['provincia']); 
				echo('</br>');
				echo ("Número de hermanos: ".$_POST['hermanos']); 
				echo('</br>');
				echo ("Altura: ".$_POST['altura']." cm"); 
				echo('</br>');
				echo ("Ha sugerido: ".$_POST['sugerencias']);
			}else{
		?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<legend>
						<h1>Formulario de Registro:</h1>
					</legend>
					<h2>Datos personales:</h2>
					 <label for="cortesia">Sexo</label>
					<div>
						<input type="radio" id="genero1" name="genero" value="Hombre">Sr.<br/> 
						<input type="radio" id="genero2" name="genero" value="Mujer">Sra.<br/> 
						<input type="radio" id="genero3" name="genero" value="Otro">Otro.<br/> 
					</div>	
					</br></br> 
					<label for="nombre">Nombre</label>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre"/>
					</br></br>
					<label for="apellidos">Primer Apellido</label> 
					<input type="text" id="apellido1" name="apellido1" placeholder="Primer Apellido"/> 
					</br></br> 
					<label for="apellidos">Segundo Apellido</label>
					<input type="text" id="apellido2" name="apellido2" placeholder="Segundo Apellido"/> 
					</br></br> 
					<label for="nacimiento">Fecha de Nacimiento</label>
					<input type="date" id="nacimiento" name="nacimiento"/>
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
					</br></br>
					<label for="email">Número de hermanos</label>
					<input type="number" id="hermanos" name="hermanos" min="0" placeholder="0"/> 
					</br></br> 
					<label for="altura">Altura</label>
					<input type="range" name="altura" min="0" max="299" step="1" value="150">
					</br></br> 
					<label for="email">Correo electronico</label>
					<input type="email" id="email" name="email" placeholder="direccion@correo.com"/> 
					</br></br> 
					<label for="email">Contraseña</label>
					<input type="password" id="contraseña" name="contraseña" placeholder="contraseña"/> 
					</br></br> 
					<label for="telefono">Número de teléfono</label> 
					<input type="tel" id="telefono" name="telefono"/> 
					</br></br>
					<label for="telefono">Buzón de sugerencias</label> </br>
					<textarea name="sugerencias" rows="15" cols="100" placeholder="Introduzca aquí sus sugerencias"></textarea>
					</br></br>
					<input type="submit" name="enviar" value="Enviar">
				</form>
		<?php
			}
		?>
	</body>
</html>