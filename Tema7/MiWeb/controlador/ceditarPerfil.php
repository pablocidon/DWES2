<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 11-02-2018.
    * Archivo: ceditarPerfil.php
    * Modificado: 11-02-2018.
*/
$vista='editarPerfil';
$correcto = false;
$mensajeError=Array(
    'descUsuario'=>'',
    'password'=>''
);
if(isset($_POST['cancelar'])){
    header('Location: index.php?pagina=login');
}else{
    require_once 'vista/layout.php';
}
if(isset($_POST['editarPerfil'])){

    $mensajeError['descUsuario'] = comprobarTexto($_POST['descUsuario'],100,1,1);
    $mensajeError['password'] = comprobarAlfaNumerico($_POST['password'],100,2,1);

    foreach ($mensajeError as $valor) {  //recorremos el array de errores
        if ($valor != null) {
            $correcto = false;
        }
    }
}
if(isset($_POST['editarPerfil'])&&$correcto){

}
?>