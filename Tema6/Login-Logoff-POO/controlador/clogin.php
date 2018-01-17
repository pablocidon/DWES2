<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: clogin.php
    * Modificado: 17-01-2018.
*/
require_once "../modelo/Usuario.php";
$correcto = false;
$error = '';
if(isset($_SESSION['usuario'])){//En caso de que se cree la sesión se dirigirá a la página de inicio.
    header('Location: index.php?pagina=inicio');
}else {//En el caso contrario se validará al usuario
    if (isset($_POST['cancelar'])) {//En caso de que se pulse en Cancelar nos iremos a la página de los contenidos
        header('Location: ../index.html');
    }
    if (filter_has_var(INPUT_POST, 'aceptar')) {//Si se ha pulsado aceptar
        $usuario = $_POST['usuario'];//Guardamos el usuario en una variable.
        $password = hash('sha256', $_POST['password']);//Guardamos el password con un algoritmo de encriptación
        $resultado = Usuario::validarUsuario($usuario, $password);//Llamamos a la función validarUsuario de la clase Usuario
        if (is_null($resultado)) {//En caso de que sea nulo devolvemos un mensaje de error
            $error = "Error en el usuario o contraseña";
        } else {//En caso de que se hayan obtenido resultados indicamos que está correctamente
            $correcto = true;
        }
    }
    if ($entradaOK) {//Si la entrada está bien se guarda la sesion y se redirige a index.php
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php?pagina=inicio");
    } else {//Si no esta bien el usuario se vuelve a mostrar el formulario
        require_once "../vista/vlogin.php";
    }
}
?>