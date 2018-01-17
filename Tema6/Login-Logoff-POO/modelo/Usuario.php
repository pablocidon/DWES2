
<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: Usuario.php
    * Modificado: 17-01-2018.
*/
require_once "UsuarioPDO.php";
class Usuario{
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;

    public static function validarUsuario($codUsuario,$password){//Función para validar el usuario.
        $usuario=null;
        $arrayUsuario=UsuarioPDO::validarUsuario($codUsuario,$password);//Llamamos a la función de validación del UsuarioPDO, que nos buscará el usuario en la base de datos
        if(!empty($arrayUsuario)) {//Si se encuentra un usuario, se crea un nuevo objeto de la clase usuario
            $usuario = new Usuario($codUsuario, $arrayUsuario['descUsuario'], $password, $arrayUsuario['perfil'], $arrayUsuario['ultimaConexion'], $arrayUsuario['contadorAccesos']);
        }
        return $usuario;
    }

    public function __construct($row){//Función constructora
        $this->codUsuario = $row['codUsuario'];
        $this->descUsuario = $row['descUsuario'];
        $this->password = $row['password'];
        $this->perfil = $row['perfil'];
        $this->ultimaConexion = $row['ultimaConexion'];
        $this->contadorAccesos = $row['contadorAccesos'];
    }

    public function getCodUsuario(){
        return $this->codUsuario;
    }

    public function getDescUsuario(){
        return $this->descUsuario;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPerfil(){
        return $this->perfil;
    }

    public function getUltimaConexion(){
        return $this->ultimaConexion;
    }

    public function getContadorAccesos(){
        return $this->contadorAccesos;
    }

    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }

    public function setDescUsuario($descUsuario){
        $this->descUsuario = $descUsuario;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    public function setUltimaConexion($ultimaConexion){
        $this->ultimaConexion = $ultimaConexion;
    }

    public function setContadorAccesos($contadorAccesos){
        $this->contadorAccesos = $contadorAccesos;
    }

}

?>