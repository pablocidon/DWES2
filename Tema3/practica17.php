<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 17</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <?php
		//Asignamos las plazas según la fila y el asiento.
		$asiento[4][2]="Pepe";
		$asiento[5][7]="Paca";
		$asiento[2][8]="Juan";
		$asiento[9][1]="Pedro";
		$asiento[7][9]="Maria";
		$asiento[1][5]="Pablo";
		foreach($asiento as $plaza => $fila){ //Recorremos el array asignando los asientos a las plazas
			foreach($fila as $butaca => $asistente){ //Recorremos el array asignando el asiento al asistente
				print("En la fila ".$plaza. " y butaca ".$butaca. " se encuentra ".$asistente); //Devolvemos la fila, butaca y asistente
				print "</br>";
			}
		}
    ?>
</html>