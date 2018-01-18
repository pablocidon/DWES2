<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: UsuarioPDO.php
    * Modificado: 17-01-2018.
 */
require_once "DBPDO.php";//Llamamos a la clase para la conexión a la base de datos
require_once "UsuarioDB.php";//Llamamos a la clase de usuario
class UsuarioPDO implements UsuarioDB{//Clase que proviene de una interfaz
    public static function validarUsuario($codUsuario, $password){
        $sql = "Select * from Usuarios WHERE CodUsuario='" . $codUsuario . "' and Password= SHA2('" . $password . "',256)";
        $arrayUsuario=[];
        $resultadoConsulta=DBPDO::ejecutaConsulta($sql,[$codUsuario,$password]);
        if ($resultadoConsulta->rowCount()==1) {
            $resultadoFetch = $resultadoConsulta->fetchObject();
            $arrayUsuario['descUsuario'] = $resultadoFetch->descUsuario;
            $arrayUsuario['perfil'] = $resultadoFetch->perfil;
            $arrayUsuario['ultimaConexion'] = $resultadoFetch->ultimaConexion;
            $arrayUsuario['contadorAccesos'] = $resultadoFetch->contadorAccesos;
        }
        return $arrayUsuario;
    }
}
?>