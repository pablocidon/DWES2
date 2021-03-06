<?php
/**
 * Class DBPDO
 *
 * Clase para la conexión a la base de datos
 *
 * PHP version 7.0
 *
 * @category DBPDO
 * @package  OperacionesDB
 * @source DBPDO.php
 * @since Versión 1.0
 * @copyright 07-02-2018
 */

class DBPDO{

    /**
     * Funcion para realizar consultas.
     *
     * La función recibe como parámetros la consulta sql y los parámetros de la misma.
     *
     * @function ejecutaConsulta()
     * @param string $consultaSQL parámetro que contiene la consulta a realizar.
     * @param array $parametros array que contendrá los parámetros que va a recibir la consulta.
     * @return null|PDOStatement Resultado que devolverá la consulta.
     */
        public static function ejecutaConsulta($consultaSQL,$parametros){//Función que nos servirá para la ejecución de las consultas
            try{//Establecemos la conexión a la base de datos
                $miDB = new PDO(DATOSCONEXION, USER,PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $consulta = $miDB->prepare($consultaSQL);//Preparamamos la consulta que será pasada como un parámetro
                $consulta->execute($parametros);//Ejecutamos la consulta con los parámetros
            }catch (PDOException $exception){//Si hay algún error
                $consulta=null;//Destruimos la consulta
                unset($miDB);
            }
            return $consulta;//Resultado que nos devuelve la función.
        }

}
?>