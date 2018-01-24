<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: UsuarioPDO.php
    * Modificado: 15-01-2018.
 */
require_once "DBPDO.php";//Llamamos a la clase para la conexión a la base de datos
require_once "../modelo/Usuario.php";
class UsuarioPDO implements UsuarioDB{//Clase que proviene de una interfaz
    public static function validarUsuario($codUsuario,$password){//Función de validación de los usuarios
        $arrayUsuario=[];
        $consulta = "SELECT CodUsuario,Password FROM Usuarios WHERE CodUsuario AND Password = SHA2('".$password."')256";
        $resultado=DBPDO::ejecutaConsulta($consulta, [$codUsuario,$password]);
        while($consulta->rowCount()){
            $usuario = $resultado->fetchObject();
            $arrayUsuario['codUsuario']=$usuario->codUsuario;
            $arrayUsuario['descUsuario']=$usuario->descUsuario;
            $arrayUsuario['password']=$usuario->password;
            $arrayUsuario['perfil']=$usuario->perfil;
            $arrayUsuario['ultimaConexion']=$usuario->ultimaConexion;
            $arrayUsuario['contadorAccesos']=$usuario->contadorAccesos;
        }
    }
}
?>