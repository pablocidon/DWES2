<!DOCTYPE html>

<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
	<title>Práctica 1</title>
  </head>
  <body>
		<?php
			// Declaración de las variables		
			$nombre = "Pablo";
			$edad = "20";
			$correcto = "1";
			$num = "0.5";
			
			// Devolución de las variables	
			echo "La variable" .' $nombre '. "es del tipo String y tiene el valor". $nombre;
			echo "</br>";
			echo "La variable" .' $edad '. "es del tipo Integer y tiene el valor". $edad;
			echo "</br>";
			echo "La variable" .' $correcto '. "es del tipo Boolean y tiene el valor". $correcto;
			echo "</br>";
			echo "La variable" .' $num '. "es del tipo Float y tiene el valor". $num;		
		?>
	</body>
</html>