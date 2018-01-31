<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 30-01-2018.
    * Archivo: vregistro.php
    * Modificado: 30-01-2018.
*/
?>
<div class="form-group">
    <label class="control-label col-md-3" for="usuario">Código Usuario</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Código Usuario" name="codUsuario">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="usuario">Descripción Usuario</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Descripción Usuario" name="descUsuario">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="password">Contraseña</label>
    <div class="col-md-5">
        <input type="password" class="form-control" placeholder="Contraseña" name="password">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="password">Repita Contraseña</label>
    <div class="col-md-5">
        <input type="password" class="form-control" placeholder="Contraseña" name="password2">
    </div>
</div>
<!--<div class="col-md-offset-2">
    <?php// echo "<span class='text-warming'>".$mensajeError."</span>";?>
</div>-->
<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
        <input type="submit" value="Aceptar" name="aceptar" class="btn btn-success">
        <input type="submit" name="cancelar" value="Cancelar" class="btn btn-danger">
    </div>
</div>
