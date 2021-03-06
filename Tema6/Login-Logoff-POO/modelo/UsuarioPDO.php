<?php
/**
 * Class UsuarioPDO
 *
 * Clase de objeto usuario
 *
 * @author Pablo Cidón Barrio.
 * @source: UsuarioPDO.php
 * @since 17-01-2018.
 */
require_once "DBPDO.php";//Llamamos a la clase para la conexión a la base de datos
require_once "UsuarioDB.php";//Llamamos a la clase de usuario
class UsuarioPDO implements UsuarioDB{//Clase que proviene de una interfaz
    /**
     * @function validarUsuario
     *
     * Función de validación de los usuarios.
     *
     * @param string $codUsuario Código del usuario a validar.
     * @param string $password Contraseña del mismo.
     * @return array $arrayUsuario Array que contiene los datos del usuario en caso de que sea válido
     */
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

    /**
     * @function contadorAccesos
     *
     * Función para contar los accesos
     *
     * @param string $codUsuario Código del usuario que será modificado en la base de datos.
     * @return mixed $visitas Cantidad de visitas que ha realizado el usuario.
     */

    public static function contadorAccesos($codUsuario){
        $contador = "Update Usuarios SET ContadorAccesos=ContadorAccesos+1 WHERE CodUsuario = '" . $codUsuario ."'";
        $resultado=DBPDO::ejecutaConsulta($contador,[$codUsuario]);
        if($resultado->rowCount()==1){
            $resultadoFetch = $resultado->fetchObject();
            $visitas = $resultadoFetch->contadorAccesos;
        }
        return $visitas;
    }

    /**
     * @function ultimaConexion
     *
     * Función para la última conexion
     *
     * @param string $codUsuario Código del usuario del que se modificará el última acceso.
     * @param datetime $conexion Fecha nueva de la última conexión.
     * @return mixed $ultimoAcceso Última vez que el usuario ha accedido.
     */

    public static function ultimaConexion($codUsuario,$conexion){
        $ultimaConexion = "Update Usuarios SET UltimaConexion='". $conexion ."'WHERE CodUsuario = '" . $codUsuario ."'";
        $resultado=DBPDO::ejecutaConsulta($ultimaConexion,[$conexion,$codUsuario]);
        if($resultado->rowCount()==1){
            $resultadoFetch = $resultado->fetchObject();
            $ultimoAcceso = $resultadoFetch->ultimaConexion;
        }
        return $ultimoAcceso;
    }
}
?>