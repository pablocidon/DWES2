<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 30-01-2018.
    * Archivo: vWSSOAP.php
    * Modificado: 30-01-2018.
*/
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Web de Pablo</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"> Inicio</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-user"> Perfil</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-list"> Mto. Departamentos</span></a></li>
            <li class="active"><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=SOAP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=SOAP "; } ?>"><span class="glyphicon glyphicon-cloud-download"> WS SOAP</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-cloud-download"> WS REST</span></a></li>
            <li><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!="inicio" && $_GET['pagina']!="login"){ echo "index.php?pagina=WIP&paginaAnterior=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>"><span class="glyphicon glyphicon-list-alt"> Encuesta</span></a></li>
        </ul>
        <input type="submit" name="volver" id="volver" value="Volver" class="btn btn-default">
        <input type="submit" name="salir" value="Cerrar Sesión" class="btn btn-danger navbar-btn">
        <div class="color1 row">
            <h1>WS SOAP</h1>
            <h3>Utilización de WS SOAP ajenos</h3>

            <h3>Utilización de WS SOAP propios</h3>
        </div>
    </div>
</nav>