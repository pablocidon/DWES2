<?php
/*
* Autor: Pablo Cidón.
* Creado: 12-01-2018.
* Archivo: DBPDO.php
* Modificado: 12-01-2018.
*/

include_once "../config/conexionDB.php";//Incluimos el fichero de configuración para conectarse a la base de datos.

class DBPDO{ //Creamos la clase para la conexión a la base de datos.

    public static function ejecutaConsulta($consultaSQL,$parametros){//Función que nos servirá para la ejecución de las consultas
        try{//Establecemos la conexión a la base de datos
            $miDB = new PDO(DATOSCONEXION, USER,PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($consultaSQL);//Preparamamos la consulta que será pasada como un parámetro
            $consulta->execute($parametros);//Ejecutamos la consulta con los parámetros
        }catch (PDOException $exception){//Si hay algún error
            $consulta=null;//Destruimos la consulta
            echo $exception->getMessage();//En caso de que salte la excepción mostramos un mensaje.
        }
        return $consulta;//Resultado que nos devuelve la función.
    }
}
?>