<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 16</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <?php
		$nombre = "Pablo"; 
		$array = array(1, 2, 3, "casa", $nombre);
		 
		//saco el numero de elementos
		$longitud = count($array);
		 
		//Recorro todos los elementos
		for($i=0; $i<$longitud; $i++){
			  //saco el valor de cada elemento
			  echo $array[$i];
			  echo "<br>";
		}
    ?>
</html>