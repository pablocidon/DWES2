<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vlogin.php
    * Modificado: 24-01-2018.
*/

?>
    <div class="form-group">
        <label class="control-label col-md-2" for="usuario">Usuario</label>
        <div class="col-md-10">
            <input type="text" class="form-control" placeholder="Usuario" name="usuario">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="password">Contraseña</label>
        <div class="col-md-10">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
        </div>
    </div>
    <div class="col-md-offset-2">
        <?php echo "<span class='text-warming'>".$error."</span>";?>
    </div>
    <div class="form-group">
        <div class="col-md-2 col-md-offset-5">
            <input type="submit" value="Aceptar" name="aceptar" class="btn btn-success">
            <input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger">
        </div>
    </div>
    <div class="col-md-offset-5">
        No tienes cuenta? <input type="submit" name="registro" value="Registrate" class="btn btn-primary">
    </div>

    <br><br>
    <div class="color1 row">
        <h3>Catálogo de Requisitos:</h3>
    </div>

<div class="color1 row">
    <h3>Diagrama de Casos de Uso:</h3>
</div>

<div class="color1 row">
    <h3>Diagrama de Clases:</h3>
    <img src="documentacion/diagramaClases.JPG" alt="Diagrama de Clases" style="width: 60%">
</div>

<div class="color1 row">
    <h3>Árbol de Navegación:</h3>
    <img src="documentacion/navegacion.JPG" alt="Árbol de Navegación">
</div>

<div class="color1 row">
    <h3>Modelo Físico de Datos:</h3>
</div>

<div class="color1 row">
    <h3>Árbol de Almacenamiento:</h3>
    <img src="documentacion/almacenamiento.JPG" alt="Árbol de Almacenamiento">
</div>











