<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 12-01-2018.
    * Archivo: vlogin.php
    * Modificado: 24-01-2018.
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
    <br><br>
    No tienes cuenta? <input type="submit" name="registro" value="Registrate">
    <br><br>
    <h3>Catálogo de Requisitos:</h3>

    <h3>Diagrama de Casos de Uso:</h3>

    <h3>Diagrama de Clases:</h3>
    <img src="documentacion/diagramaClases.JPG" alt="Diagrama de Clases">
    <h3>Árbol de Navegación:</h3>
    <img src="documentacion/navegacion.JPG" alt="Árbol de Navegación">
    <h3>Modelo Físico de Datos:</h3>

    <h3>Árbol de Almacenamiento:</h3>
    <img src="documentacion/almacenamiento.JPG" alt="Árbol de Almacenamiento">


