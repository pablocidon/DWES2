<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 12</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <?php
		print_r($_SERVER);
		// Devuelve todos los datos que contiene el Array de la Variable superglobal que se pase como parámetro.
		echo("</br>");
		foreach($_REQUEST as $clave => $valor){//Recorre el Array.
			print("$clave:$valor</br>");//Asigna un contenido a un valor.
		}
		print_r($_REQUEST);
		//Devuelve el contenido del array.
	?>
</html>