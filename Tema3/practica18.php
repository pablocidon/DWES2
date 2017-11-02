<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 18</title>
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
		//Recorrer los arrays pero con funciones
		foreach($asiento as $plaza => $fila){
			foreach($fila as $butaca => $asistente){
				print("En la fila ".$plaza. " y butaca ".$butaca. " se encuentra ".$asistente);
				print "</br>";
			}
		}
    ?>
</html>