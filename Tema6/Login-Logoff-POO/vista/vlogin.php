<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vlogin.php
    * Modificado: 18-01-2018.
*/

?>
    <label for="usuario">Usuario</label>
    <input type="text" placeholder="Usuario" name="usuario">
    <br><br>
    <label for="password">Contraseña</label>
    <input type="password" placeholder="Contraseña" name="password">
    <br><br>
    <?php echo "<span class='error'>".$error."</span>";?>
    <br><br>
    <input type="submit" value="Aceptar" name="aceptar">
    <input type="submit" value="Cancelar" name="cancelar">

