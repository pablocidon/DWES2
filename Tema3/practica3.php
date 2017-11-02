<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pr�ctica 3</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>
		<?php 
			date_default_timezone_set('Europe/Madrid'); //Establecemos la zona horaria de Madrid, para la hora de Espa�a.
			$numero_mes = date("m"); 
			$numero_dia_semana = date("N"); 
			switch($numero_mes){ 
				 case 1: $mes = "Enero"; 
				 break; 
				 case 2: $mes = "Febrero"; 
				 break; 
				 case 3: $mes = "Marzo"; 
				 break; 
				 case 4: $mes = "Abril"; 
				 break; 
				 case 5: $mes = "Mayo"; 
				 break; 
				 case 6: $mes = "Junio"; 
				 break; 
				 case 7: $mes = "Julio"; 
				 break; 
				 case 8: $mes = "Agosto"; 
				 break; 
				 case 9: $mes = "Septiembre"; 
				 break; 
				 case 10: $mes = "Octubre"; 
				 break; 
				 case 11: $mes = "Noviembre"; 
				 break; 
				 case 12: $mes = "Diciembre"; 
				 break; 
			} //Seg�n el n�mero de mes devulve el nombre del mismo.
				 switch($numero_dia_semana){ 
				 case 1: $dia_semana = "Lunes"; 
				 break; 
				 case 2: $dia_semana = "Martes"; 
				 break; 
				 case 3: $dia_semana = "Mi�rcoles"; 
				 break; 
				 case 4: $dia_semana = "Jueves"; 
				 break; 
				 case 5: $dia_semana = "Viernes"; 
				 break; 
				 case 6: $dia_semana = "S�bado"; 
				 break; 
				 case 7: $dia_semana = "Domingo"; 
				break; 
			 }//Seg�n el n�mero de d�a devulve el nombre del mismo.
			print $dia_semana.", ".date("j")." de ".$mes." de ".date("Y")." ".date("g:i:s");
			//Devuelve la fecha formateada como Dia de la semana, dia, mes y a�o.
		?>
	</body>
</html>
