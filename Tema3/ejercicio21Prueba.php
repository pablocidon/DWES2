<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Práctica 21</title>
        <meta charset="UTF-8">
	</head>
	<body>	
		<?php
			if(isset($_POST['enviar'])){
				echo ("Nombre y apellidos: ".$_REQUEST['nombre']."  ".$_REQUEST['apellido1']); 
				echo('</br>');
				
			}else{
		?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<legend>
						<h1>Formulario de Registro:</h1>
					</legend>
					<h2>Datos personales:</h2>
					
					<label for="nombre">Nombre</label>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre"/>
					</br></br>
					<label for="apellidos">Primer Apellido</label> 
					<input type="text" id="apellido1" name="apellido1" placeholder="Primer Apellido"/> 
					</br></br> 
			
					
					<input type="submit" name="enviar" value="Enviar">
				</form>
		<?php
			}
		?>
	</body>
</html>