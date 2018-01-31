<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 30-01-2018.
    * Archivo: cregistro.php
    * Modificado: 30-01-2018.
*/
$vista='registro';
$correcto = false;
$mensajeError=Array(
    'codUsuario'=>'',
    'descUsuario'=>'',
    'password'=>'',
    'password2'=>'',
    'distinto'=>''
);

if(isset($_POST['aceptar'])){
    if($mensajeError['codUsuario'] = comprobarAlfaNumerico($_POST['codUsuario'],10,3,1) == null){
        $comprobacion = Usuario::consultaPerfil($_POST['codUsuario']);
        $resultado = $comprobacion->fetchColumn(0);
        if ($resultado) {//En caso de exista mostraremos un mensaje de error.
            $mensajeError['codUsuario'] = "Este código ya existe";
            $correcto = false;
        }
    }
    $mensajeError['descUsuario'] = comprobarTexto($_POST['descUsuario'],100,1,1);
    if($mensajeError['password'] = comprobarAlfaNumerico($_POST['password'],100,2,1) == null && $mensajeError['password2'] = comprobarAlfaNumerico($_POST['password2'],100,2,1) == null){
        if($_POST['password']===$_POST['password2']){
            $correcto = true;
        }else{
            $mensajeError['distinto'] = 'Las contraseñas no coinciden';
        }
    }
    foreach ($errores as $valor) {  //recorremos el array de errores
        if ($valor != null) {
            $correcto = false;
        }
    }
}
if(isset($_POST['cancelar'])){
    header('Location: index.php?pagina=login');
}else{
    require_once 'vista/layout.php';
}

?>