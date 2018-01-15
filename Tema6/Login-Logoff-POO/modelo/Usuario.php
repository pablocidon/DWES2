
<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: Usuario.php
    * Modificado: 15-01-2018.
*/
require_once "../datos/UsuarioPDO.php";
class Usuario{
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;

    public static function validarUsuario($codUsuario,$password){
        
    }

    public function __construct($row){
        $this->codUsuario = $row['codUsuario'];
        $this->descUsuario = $row['descUsuario'];
        $this->password = $row['password'];
        $this->perfil = $row['perfil'];
        $this->ultimaConexion = $row['ultimaConexion'];
        $this->contadorAccesos = $row['contadorAccesos'];
    }

}

?>