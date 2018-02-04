<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vlogin.php
    * Modificado: 24-01-2018.
*/

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="webroot/css/bootstrap.min.css">
    <link rel="stylesheet" href="webroot/css/estilos.css">
</head>

    <div class="form-group">
        <label class="control-label col-md-2" for="usuario">Usuario</label>
        <div class="col-md-2">
            <input type="text" class="form-control" placeholder="Usuario" name="usuario">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="password">Contraseña</label>
        <div class="col-md-2">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
        </div>
    </div>
    <div class="col-md-offset-2">
        <?php echo "<span class='text-warming'>".$error."</span>";?>
    </div>
    <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            <input type="submit" value="Entrar" name="aceptar" class="btn btn-success">
            <input type="submit" name="registro" value="Registrate" class="btn btn-primary">
        </div>
    </div>

    <div class="color1">
        <div class="container">
            <br>
            <div class="col-md-12">
                <div id="carousel-1" class="carousel slide" data-ride="carousel">
                    <!--Indicadores-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"  style="background-color: black"></li>
                        <li data-target="#carousel-1" data-slide-to="1"  style="background-color: black"></li>
                        <li data-target="#carousel-1" data-slide-to="2"  style="background-color: black"></li>
                    </ol>

                    <!--Contenedor slide -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="documentacion/almacenamiento.JPG" class="img-responsive" alt="">
                            <div class="carousel-caption">
                                <p style="color: black">Árbol de Almacenamiento</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="documentacion/diagramaClases.JPG" class="img-responsive" alt="">
                            <div class="carousel-caption">
                                <p style="color: black">Diagrama de Clases</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="documentacion/navegacion.JPG" class="img-responsive" alt="">
                            <div class="carousel-caption">
                                <p style="color: black">Árbol de Navegación</p>
                            </div>
                        </div>
                    </div>
                    <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
<br><br>
<script src="webroot/js/jquery.js"></script>
<script src="webroot/js/bootstrap.min.js"></script>












