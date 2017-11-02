<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 20</title>
        <meta charset="UTF-8">
    </head>
    <?php //Cuando pulsamos el botón de enviar en el formulario nos remite a otra página y nos muestra lo que hemos introducido.
		echo ("Nombre y apellidos: ".$_POST['nombre']."  ".$_POST['apellido1']."  ".$_POST['apellido2']); //Nos devulve los valores introducidos en los campos del nombre y de los apellidos
				echo('</br>');
				echo ("Género: ".$_POST['genero']); //Nos devulve el valor seleccionado en las pestañas.
				echo('</br>');
				echo ("Fecha de nacimiento: ".$_POST['nacimiento']); //Devuelve el dato de tipo fecha con formato de fecha
				echo('</br>');
				echo ("Dirección de correo: ".$_REQUEST['email']." Contraseña: ".$_REQUEST['contraseña']); //Devuelve los campos de correo y contraseña
				echo('</br>');
				echo ("Teléfono de contacto: ".$_POST['telefono']); //Devuelve los datos introducidos en el campo del teléfono
				echo('</br>');
				echo ("Provincia: ".$_POST['provincia']); //Devuelve el dato seleccionado en la lista desplegable.
				echo('</br>');
				echo ("Número de hermanos: ".$_POST['hermanos']); //Devuelve el valor seleccionado en el campo numérico.
				echo('</br>');
				echo ("Altura: ".$_POST['altura']." cm"); //Devuelve indicado en la barra.
				echo('</br>');
				echo ("Ha sugerido: ".$_POST['sugerencias']); //Devuelve lo introducido en el área de texto.
    ?>
</html>