<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 15</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <?php
		$sueldoTotal = 0;
		$sueldo = array(
		"Lunes" =>  120,
		"Martes" => 125,
		"Miércoles" => 130,
		"Jueves" => 140,
		"Viernes" => 150,
		"Sábado" => 160,
		"Domingo" => 170,
		);//Declaramos el array asignandole el sueldo según el día de la semana.
		foreach($sueldo as $dia => $nomina){//Recorremos el array asignando a $dia el día de la semana y a la nómina el salario del respectivo día.
			print('Dia: '.$dia.' Sueldo: '.$nomina."</br>");//Mostramos los días con su respectivo salario.
			$sueldoTotal+=$nomina;//Sumamos el sueldo diario y lo almacenamos en el salario total.
		}
		print_r('Sueldo semanal: '.$sueldoTotal);//Devolución del sueldo total en la semana.
    ?>
</html>