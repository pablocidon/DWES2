<?php
/*
 * Autor: Pablo Cidón.
 * Creado: 14-01-2018.
 * Archivo: Producto.php.
 * Modificado:
 */
class Producto{
    //Atributos de la clase producto
    protected $codigo;
    protected $nombre;
    protected $nombreCorto;
    protected $precio;

    public function getCodigo(){
        return $this->codigo;//Función que devulve el código del producto;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getNombreCorto(){
        return $this->nombreCorto;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function muestra(){
        print "<p>" . $this->codigo . "</p>";
    }

    public function __construct($row){
        $this->codigo = $row['codigo'];
        $this->nombre = $row['nombre'];
        $this->nombreCorto = $row['nombreCorto'];
        $this->precio = $row['precio'];
    }

}
?>