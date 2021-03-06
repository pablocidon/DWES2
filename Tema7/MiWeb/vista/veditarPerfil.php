<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: veditarPerfil.php
    * Modificado: 11-02-2018.
*/
?>
<div class="form-group">
    <label class="control-label col-md-3" for="usuario">Código Usuario</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Código Usuario" name="codUsuario" value="<?php echo $_SESSION['usuario']->getCodUsuario();?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="usuario">Descripción Usuario</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Descripción Usuario" name="descUsuario"  <?php if(isset($_POST['descUsuario']) && empty($mensajeError['descUsuario'])){ echo 'value="',$_POST['descUsuario'],'"';}?>>
    </div>
    <div class="col-md-offset-2">
        <?php echo "<span class='text-warming'>".$mensajeError['descUsuario']."</span>";?>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="password">Contraseña</label>
    <div class="col-md-5">
        <input type="password" class="form-control" placeholder="Contraseña" name="password" <?php if(isset($_POST['password']) && empty($mensajeError['password'])){ echo 'value="',$_POST['password'],'"';}?>>
    </div>
    <div class="col-md-offset-2">
        <?php echo "<span class='text-warming'>".$mensajeError['password']."</span>";?>
    </div>
</div>


<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
        <input type="submit" value="Guardar Cambios" name="editarPerfil" class="btn btn-success">
        <input type="submit" name="cancelar" value="Cancelar" class="btn btn-warming">
        <input type="submit" name="eliminarCuenta" value="Eliminar Cuenta" class="btn btn-danger">
    </div>
</div>
