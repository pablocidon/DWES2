<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 5</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>
		<?php 
			$t = time();//Toma el valor del día.
			echo nl2br('Marca de tiempo: '.$t);//Devuelve la marca de tiempo.
			echo("</br>");
			echo nl2br('Fecha actual: '.date('d-m-Y'));//Devuelve la fecha actual.
		?>
	</body>
</html>