<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../base.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>PCB-DWES</title>
</head>
<body>
<header>
    <h1>LOGIN-LOGOFF</h1>
</header>
<?php
    require "Librerias/conexionDB.php";
    if(isset($_POST['cancelar'])){
        header('Location:../index.html');
    }
 try {
      $miDB=new PDO(DATOSCONEXION, USER,PASSWORD);
      $miDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      if(filter_has_var(INPUT_POST, 'aceptar')){
          
      }

     if (!filter_has_var(INPUT_POST, 'aceptar')) {
         ?>
         <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
             <label for="usuario">Usuario</label>
             <input type="text" placeholder="Usuario" name="usuario">
             <br><br>
             <label for="password">Contraseña</label>
             <input type="password" placeholder="Contraseña" name="password">
             <br><br>
             <input type="submit" value="Aceptar" name="aceptar">
             <input type="submit" value="Cancelar" name="cancelar">
         </form>
         <?php
     }else{
         session_start();
         header('Location:programa.php');
     }
 }catch (PDOException $exception){
    echo $exception->getMessage();
 }finally{
    unset($miDB);
    exit();
 }
?>
</body>
</html>