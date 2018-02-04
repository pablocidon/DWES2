<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vinicio.php
    * Modificado: 19-01-2018.
*/
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Web de Pablo</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"> Inicio</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-user"> Perfil</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-list"> Mto. Departamentos</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=SOAP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=SOAP "; } ?>"><span class="glyphicon glyphicon-cloud-download"> WS SOAP</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-cloud-download"> WS REST</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-list-alt"> Encuesta</span></a></li>
        </ul>
        <input type="submit" name="salir" value="Cerrar Sesión" class="btn btn-danger navbar-btn">
        <div class="color1 row">
            <?php
                echo "<h1>Bienvenido ",$_SESSION['usuario']->getCodUsuario(),"</h1><br>";
                echo "<h1>Tiene permisos de ",$_SESSION['usuario']->getPerfil(),"</h1><br>";
                echo "<h1>Número de conexiones ",$_SESSION['usuario']->getContadorAccesos(),"</h1><br>";
                echo "<h1>Ultima conexión ",$_SESSION['usuario']->getUltimaConexion(),"</h1><br>";
            ?>
        </div>
    </div>
</nav>






