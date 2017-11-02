<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 6</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>
		<?php 
			$fechaHoy = date('d-m-Y');//Tomamos la fecha local. 
            $sesentaDias = strtotime ( '+60 day' , strtotime ( $fechaHoy ) ) ;//Calculamos 60 días a partir de la fecha. 
            $fecha = date ( 'd-m-Y' , $sesentaDias );//Almacenamos la fecha con el formato Dia-Mes-Año dentro de 60 días. 
            
			echo 'Hoy: '.$fechaHoy;//Fecha local.
			echo "</br>";
            echo 'Dentro de 60 días: '.$fecha; //Dentro de 60 días.
			//Devolvemos la fecha local y la fecha de dentro de 60 días.
		?>
	</body>
</html>