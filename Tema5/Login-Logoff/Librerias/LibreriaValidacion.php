<?php
// Funciones de Validación
// Blibioteca con funciones de validación
// Función para comprobar si es un campo solo texto
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
//Autor: Rodrigo
//Fecha: 24/11/2017
function comprobarTexto($cadena,$maxTamanio,$minTamanio,$obligatorio){
    // Patrón para campos de solo texto
    $patron_texto = "/^[a-zA-ZñáéíóúÁÉÍÓÚäëïöüÄËÏÖÜÑàèìòùÀÈÌÒÙ\s]+$/";
    $cadena=htmlspecialchars(strip_tags(trim((string)$cadena)));
    $correcto=null;
    if( preg_match($patron_texto, $cadena) && comprobarNoVacio((string)$cadena) && comprobarMaxTamanio((string)$cadena,$maxTamanio) && comprobarMinTamanio((string)$cadena,$minTamanio) )
    {
        $correcto = null;
    }else{
        $correcto="Error ";
    }
    if(!preg_match($patron_texto, $cadena)){
        $correcto.=" tiene que ser una cadena";
    }
    if (comprobarNoVacio((string)$cadena)==false){
        $correcto.= " campo Vacio";
    }
    if (comprobarMaxTamanio((string)$cadena,$maxTamanio)==false){
        $correcto .=" El tamaño maximo es ".$maxTamanio ;
    }
    if (comprobarMinTamanio((string)$cadena,$minTamanio)==false){
        $correcto.=" El tamaño minimo es ".$minTamanio;
    }
    if (empty($cadena) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
//Función para comprobar codigo de departamentos, solo se pueden meter letras de la a a la z minuscula
//y la A y Z mayusculas.
function comprobarCodigo($cadena,$maxTamanio,$minTamanio,$obligatorio){
    // Patrón para campos de solo texto
    $patron_texto = "/^[a-zA-Z]+$/";
    $cadena=htmlspecialchars(strip_tags(trim((string)$cadena)));
    $correcto=null;
    if( preg_match($patron_texto, $cadena) && comprobarNoVacio((string)$cadena) && comprobarMaxTamanio((string)$cadena,$maxTamanio) && comprobarMinTamanio((string)$cadena,$minTamanio) )
    {
        $correcto = null;
    }else{
        $correcto="Error ";
    }
    if(!preg_match($patron_texto, $cadena)){
        $correcto.=" Solo pueden ser letras";
    }
    if (comprobarNoVacio((string)$cadena)==false){
        $correcto.= " campo Vacio";
    }
    if (comprobarMaxTamanio((string)$cadena,$maxTamanio)==false){
        $correcto .=" El tamaño maximo es ".$maxTamanio ;
    }
    if (comprobarMinTamanio((string)$cadena,$minTamanio)==false){
        $correcto.=" El tamaño minimo es ".$minTamanio;
    }
    if (empty($cadena) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
// Función para comprobar un campo AlfaNumerico
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
function comprobarAlfaNumerico($cadena,$maxTamanio,$minTamanio,$obligatorio){
    $cadena=htmlspecialchars(strip_tags(trim((string)$cadena)));
    $correcto =null;
    if (comprobarNoVacio((string)$cadena) && comprobarMaxTamanio((string)$cadena,$maxTamanio) && comprobarMinTamanio((string)$cadena,$minTamanio)){
        $correcto =null;
    }else{
        $correcto="Error ";
    }
    if (comprobarNoVacio((string)$cadena)==false){
        $correcto.= "campo Vacio";
    }
    if (comprobarMaxTamanio((string)$cadena,$maxTamanio)==false)  {
        $correcto .=" El tamaño maximo es ".$maxTamanio ;
    }
    if (comprobarMinTamanio((string)$cadena,$minTamanio)==false){
        $correcto.=" El tamaño minimo es ".$minTamanio;
    }
    if (empty($cadena) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
// Función para comprobar si es un campo entero
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
function comprobarEntero($integer,$obligatorio){
    $correcto = null;
    if( filter_var($integer, FILTER_VALIDATE_INT) && comprobarNoVacio($integer)){
        $correcto = null;
    }else{
        $correcto="Error ";
    }
    if (!filter_var($integer, FILTER_VALIDATE_INT)){
        $correcto.= "no es un entero";
    }
    if (!comprobarNoVacio($integer)){
        $correcto.= " campo vacio";
    }
    if (empty($integer) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
// Función para comprobar si es un campo float
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
function comprobarFloat($float,$obligatorio){
    $correcto = null;
    if (filter_var($float, FILTER_VALIDATE_FLOAT) && comprobarNoVacio($float)){
        $correcto= null;
    }else{
        $correcto="Error ";
    }
    if (!filter_var($float, FILTER_VALIDATE_FLOAT)){
        $correcto.=" float no valido";
    }
    if (!comprobarNoVacio($float)){
        $correcto.= "campo vacio";
    }
    if (empty($float) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
// Función para comprobar si es un correo electronico
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
function validarEmail ($email,$maxTamanio,$minTamanio,$obligatorio){
    $correcto = null;
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && comprobarNoVacio($email) && comprobarMaxTamanio($email,$maxTamanio) && comprobarMinTamanio($email,$minTamanio)){
        $correcto = null;
    }else{
        $correcto = "Error ";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $correcto .= " correo no valido";
    }
    if (!comprobarNoVacio($email)){
        $correcto.= " campo Vacio";
    }
    if (!comprobarMaxTamanio($email,$maxTamanio)){
        $correcto .=" El tamaño maximo es ".$maxTamanio ;
    }
    if (!comprobarMinTamanio($email,$minTamanio)){
        $correcto.=" El tamaño minimo es ".$minTamanio;
    }
    if (empty(htmlspecialchars(strip_tags(trim($email)))) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
// Función para comprobar si es una url
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
function validarURL ($url,$obligatorio){
    $correcto = null;
    if (filter_var ($url, FILTER_VALIDATE_URL)  && comprobarNoVacio($url)){
        $correcto = null;
    }else {
        $correcto = "Error ";
    }
    if (!filter_var ($url, FILTER_VALIDATE_URL)){
        $correcto .= " formato incorrecto de url";
    }
    if (!comprobarNoVacio($url)){
        $correcto.= " campo Vacio";
    }
    if (empty(htmlspecialchars(strip_tags(trim($url)))) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Rodrigo
//Fecha: 24/11/2017
function validarFecha ($fecha,$obligatorio){
    $correcto = null;
    $fechaMinima="1900-01-01";
    $fechaMaxima=date("Y-m-d");
    if (validateDate($fecha) && comprobarNoVacio($fecha) && ($fecha>$fechaMinima) && ($fecha<$fechaMaxima)){
        $correcto = null;
    }else {
        $correcto = "Error ";
    }
    if (!validateDate($fecha, 'Y-m-d')){
        $correcto .= " formato incorrecto de fecha (Año-Mes-dia)";
    }
    if ($fecha < $fechaMinima){
        $correcto .= " la fecha tiene que ser superior a $fechaMinima";
    }
    if ($fecha > $fechaMaxima){
        $correcto .= " la fecha tiene que ser inferior a $fechaMaxima";
    }
    if (empty(htmlspecialchars(strip_tags(trim($fecha)))) && $obligatorio==0){
        $correcto=null;
    }
    return $correcto;
}
//Autor: Lucia
//Fecha: 24/11/2017
//Funcion para validar DNI, se le pasa un dni y se comprueba si la letra corresponde a la parte numerica
function validacionDNI($dni){
    $correcto=null;
    $numeros = substr($dni, 0, -1); //cogera desde el primer caracter de la cadena hasta el penultimo
    $letra = strtoupper(substr($dni, -1)); //cogera el ultimo caracter
    $letrasPosibles="TRWAGMYFPDXBNJZSQVHLCKE"; //letras que pueden aparecer en el dni
    $numeroLetra=$numeros % 23;
    if (empty($dni)) {
        $correcto = "El campo dni no puede estar vacio";
        /*
        Comprobamos que las letras y el numero del dni, las letras tiene que ser una de las que estan almacenadas
        en la variable $letrasPosibles y tiene que corresponder a la letra de $numeroLetra.
        Despues comprobamos que la longitud del string $letra es 1 y que la longitud del string $numero es 8
                  */
    } else if(!(substr($letrasPosibles, $numeroLetra, 1) == $letra && strlen($letra) == 1 && strlen($numeros)==8)){
        $correcto="Dni no valido";
    }
    return $correcto;
}
// Función para validar si no esta vacio
// Return false esta vacio, true no esta vacio
function comprobarNoVacio($cadena){
    $correcto = false;
    $cadena=htmlspecialchars(strip_tags(trim($cadena)));
    if (!empty($cadena)){
        $correcto=true;
    }
    return $correcto;
}
// Función para tamaño maximo
// Si tamaño es 0 significa que no tiene limite
// Return false no es correcto, true es correcta
function comprobarMaxTamanio ($cadena,$tamanio){
    $correcto= false;
    if ((strlen($cadena))<=$tamanio || $tamanio==0){
        $correcto=true;
    }
    return $correcto;
}
// Función para tamaño minimo
// Si el tamaño es 0 significa que no tiene limite
// Return false no es correcto, true es correcta
function comprobarMinTamanio ($cadena,$tamanio){
    $correcto= false;
    if (strlen($cadena)>=$tamanio || $tamanio==0){
        $correcto=true;
    }
    return $correcto;
}
// Función para validar la fecha
// Recibe una fecha y un formato el por defecto es año-mes-dia
// Devuelve True si es una fecha valida y un false si no la es
function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
//Autor: Lucia
//Fecha: 24/11/2017
function horaActual(){
    date_default_timezone_set("Europe/Madrid"); //indicamos la zona horaria
    $numero_mes = date('m');  //variable que recoje el mes
    $hora = date("H:i:s"); //variable que recoje la hora
    //con los dos switch siguientes formatearemos la fecha
    switch (date('N')) { //asignamos a cada numero (El numero vienep por el formato de N) un dia de la semana
        case 1:
            $dia_semana="Lunes";
            break;
        case 2:
            $dia_semana="Martes";
            break;
        case 3:
            $dia_semana="Miercoles";
            break;
        case 4:
            $dia_semana = "Jueves";
            break;
        case 5:
            $dia_semana= "Viernes";
            break;
        case 6:
            $dia_semana="Sabado";
            break;
        case 7:
            $dia_semana = "Domingo";
            break;
    }
    switch ($numero_mes){ //asignamos a cada numero un mes del año
        case 1:
            $mes="Enero";
            break;
        case 2:
            $mes="Febrero";
            break;
        case 3:
            $mes="Marzo";
            break;
        case 4:
            $mes = "Abril";
            break;
        case 5:
            $mes= "Mayo";
            break;
        case 6:
            $mes="Junio";
            break;
        case 7:
            $mes = "Julio";
            break;
        case 8:
            $mes="Agosto";
            break;
        case 9:
            $mes="Septiembre";
            break;
        case 10:
            $mes="Octubre";
            break;
        case 11:
            $mes="Noviembre";
            break;
        case 12:
            $mes="Diciembre";
            break;
    }
    return $dia_semana.", ".date("j")." de ".$mes." de ".date("Y")." ".$hora; //mostramos la fecha y la hora
}
//Autor: Lucia
//Fecha: 24/11/2017
function validarTelefono($telefono) {
    $correcto = null;
    //establecemos el patron para los numero de telefono
    $patron = "/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/";
    if (empty($telefono)) {
        $correcto = "el campo telefono no puede estar vacio";
        //comprobamos que el numero de telefono sigue el patron indicado
    } else if (!preg_match($patron, $telefono)) {
        $correcto = "El numero de telefono no es valido";
    }
    return $correcto;
}
?>