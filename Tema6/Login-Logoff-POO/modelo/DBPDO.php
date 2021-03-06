<?php
/**
 * Class DBPDO
 *
 * Clase para la conexión a la base de datos
 *
 * @author Pablo Cidón Barrio.
 * @source: DBPDO.php
 * @since 12-01-2018.
 */

class DBPDO{

    /**
     * @function ejecutaConsulta
     *
     * La función recibe como parámetros la consulta sql y los parámetros de la misma.
     *
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