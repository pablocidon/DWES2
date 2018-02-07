<?php/** *Operaciones sobre los usuarios * * Clase usuario para la realización de operaciones con el objeto. * * PHP version 7.0 * * @category UsuarioPDO * @package  OperacionesDB * @source UsuarioPDO.php * @since Versión 1.0 * @copyright 07-02-2018 */require_once "DBPDO.php";//Llamamos a la clase para la conexión a la base de datosrequire_once "UsuarioDB.php";//Llamamos a la clase de usuario/** * Class UsuarioPDO * * Clase de objeto usuario * * @author Pablo Cidón Barrio. */class UsuarioPDO implements UsuarioDB{//Clase que proviene de una interfaz    /**     * @function validarUsuario()     *     * Función de validación de los usuarios.     *     * @param string $codUsuario Código del usuario a validar.     * @param string $password Contraseña del mismo.     * @return array $arrayUsuario Array que contiene los datos del usuario en caso de que sea válido     */    public static function validarUsuario($codUsuario, $password){        $sql = "Select * from Usuarios WHERE CodUsuario='" . $codUsuario . "' and Password= SHA2('" . $password . "',256)";        $arrayUsuario=[];        $resultadoConsulta=DBPDO::ejecutaConsulta($sql,[$codUsuario,$password]);        if ($resultadoConsulta->rowCount()==1) {            $resultadoFetch = $resultadoConsulta->fetchObject();            $arrayUsuario['descUsuario'] = $resultadoFetch->DescUsuario;            $arrayUsuario['perfil'] = $resultadoFetch->Perfil;            $arrayUsuario['ultimaConexion'] = $resultadoFetch->UltimaConexion;            $arrayUsuario['contadorAccesos'] = $resultadoFetch->ContadorAccesos;        }        return $arrayUsuario;    }    /**     * @function contadorAccesos()     *     * Función para contar los accesos     *     * @param string $codUsuario Código del usuario que será modificado en la base de datos.     * @return mixed $visitas Cantidad de visitas que ha realizado el usuario.     */    public function contadorAccesos($codUsuario){        /*$contador = "Update Usuarios SET ContadorAccesos=ContadorAccesos+1 WHERE CodUsuario = '" . $codUsuario ."'";        $resultado=DBPDO::ejecutaConsulta($contador,[$codUsuario]);        if($resultado->rowCount()==1){            $resultadoFetch = $resultado->fetchObject();            $visitas = $resultadoFetch->ContadorAccesos;        }        return $visitas;*/    }    /**     * @function ultimaConexion()     *     * Función para la última conexion     *     * @param string $codUsuario Código del usuario del que se modificará el última acceso.     * @param datetime $conexion Fecha nueva de la última conexión.     * @return mixed $ultimoAcceso Última vez que el usuario ha accedido.     */    public function ultimaConexion($codUsuario,$conexion){        /*$ultimaConexion = "Update Usuarios SET UltimaConexion='". $conexion ."'WHERE CodUsuario = '" . $codUsuario ."'";        $resultado=DBPDO::ejecutaConsulta($ultimaConexion,[$conexion,$codUsuario]);        if($resultado->rowCount()==1){            $resultadoFetch = $resultado->fetchObject();            $ultimoAcceso = $resultadoFetch->UltimaConexion;        }        return $ultimoAcceso;*/    }    /**     * @function crearPerfil()     *     * Función para registrarse     *     * @param string $codUsuario Código del nuevo usuario.     * @param string $descUsuario Descripción del nuevo usuario.     * @param string $password Contraseña del nuevo usuario.     */    public static function crearPerfil($codUsuario,$descUsuario,$password){        $registrado=false;        $consulta="INSERT INTO Usuarios (codUsuario,password,perfil,descripcion) VALUES (?,?,?,'Usuario')";        $resConsulta= DBPDO::ejecutarConsulta($consulta,[$codUsuario,$descUsuario,$password]);        if ($resConsulta->rowCount()==1){            $registrado=true;        }        return $registrado;    }    /**     * @function existeUsuario()     *     * Función para comprobar si ya existe otro usuario con el mismo código.     *     * @param $codUsuario Código del usuario a comprobar.     * @return bool $existe En caso de que ese código ya exista, devolverá true, de lo contrario devolverá false     */    public static function existeUsuario($codUsuario){        $existe=false;        $consulta="Select CodUsuario from Usuarios where CodUsuario='?'";        $resultado= DBPDO::ejecutarConsulta($consulta, [$codUsuario]);        if ($resultado->rowCount()==1){            $existe=true;        }        return $existe;    }}?>