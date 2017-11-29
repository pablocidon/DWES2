<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Has pulsado Cancelar';
    exit;
} else {
    if($_SERVER['PHP_AUTH_USER']=="pablo" && $_SERVER['PHP_AUTH_PW']=="paso"){
        print_r($_SERVER);
        echo '<br>';
        print_r($_SESSION);
        echo '<br>';
        print_r($_COOKIE);
    }else{
        echo "No puedes acceder al contenido";
    }
}
?>