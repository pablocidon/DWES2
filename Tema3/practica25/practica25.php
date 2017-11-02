<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 25</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
        require 'LibreriaValidacion.php';
        $entradaOK = true;
        $datos = array();
        $errores = array();
        $datos = array(
            'fecha' => '',
            'temperatura' => '',
            'presion' => ''
        );
        $errores = array(
            'fecha' => '',
            'temperatura' => '',
            'presion' => ''
        );
        $presionMedia = array_sum(array($datos['presion'])) / count(array($datos['presion']));
        $temperaturaMedia = array_sum(array($datos['temperatura'])) / count(array($datos['temperatura']));
        if (isset($_POST['calculo'])) {
            $errores['fecha'] = validarFecha($_POST['fecha'], 1);
            $errores['temperatura'] = comprobarFloat($_POST['temperatura'], 1);
            $errores['presion'] = comprobarEntero($_POST['presion'], 1);
            foreach ($errores as $valor) {
                if ($valor != null) {
                    $entradaOK = false;
                }
            }
        }
        if (!filter_has_var(INPUT_POST, 'calculo') || $entradaOK == false) {
            ?>
            <form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                <legend>
                    <h1>NUEVO REGISTRO</h1>
                </legend>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" <?php if (isset($_POST['fecha']) && empty($mensajeError['fecha'])) {
            echo 'value="', $_POST['fecha'], '"';
        } ?>/>
                <span class="error"><?php echo $errores["fecha"]; ?></span><hr>
                <label for="temperatura">Temperatura:</label>
                <input type="float" name="temperatura" min="-30" max="50" placeholder="Temperatura"<?php if (isset($_POST['temperatura']) && empty($mensajeError['temperatura'])) {
            echo 'value="', $_POST['temperatura'], '"';
        } ?>/>
                <span class="error"><?php echo $errores["temperatura"]; ?></span><hr>
                <label for="presion">Presión Atmosférica:</label>
                <input type="integer" name="presion" min="950" max="1050" placeholder="Presión Atmosférica"<?php if (isset($_POST['presion']) && empty($mensajeError['presion'])) {
            echo 'value="', $_POST['presion'], '"';
        } ?> />
                <span class="error"><?php echo $errores["presion"]; ?></span><hr>
                <input id="nuevo" type="submit" value="Añadir Registro" name="nuevo"/>
                <input id="calculo" type="submit" value="Calcular Promedios" name="calculo"/>
            </form>
            <?php
        } else {
            $datos = array(
                'fecha' => $_POST['fecha'],
                'temperatura' => $_POST['temperatura'],
                'presion' => $_POST['presion']
            );
            ?>
            <h1>ANÁLISIS DE RESULTADOS</h1>
            <table border="1">
                <tr>
                    <th>Fecha</th>
                    <th>Temperatura</th>
                    <th>Presión</th>
                </tr>
                <tr>
                    <td><?php echo ($datos['fecha']); ?></td>
                    <td><?php echo ($datos['temperatura']); ?></td>
                    <td><?php echo ($datos['presion']); ?></td>
                </tr>
                <table>
                    <hr>
                    <table border="1">
                        <tr>
                            <th>Temperatura máxima:</th>
                            <td><?php echo max(array($datos['temperatura'])); ?></td>
                        </tr>
                        <tr>
                            <th>Temperatura mínima:</th>
                            <td><?php echo min(array($datos['temperatura'])); ?></td>
                        </tr>
                        <tr>
                            <th>Temperatura media:</th>
                            <td><?php echo $temperaturaMedia; ?></td>
                        </tr>
                    </table>
                    <hr>
                    <table border="1">
                        <tr>
                            <th>Presión máxima:</th>
                            <td><?php echo max(array($datos['presion'])); ?></td>
                        </tr>
                        <tr>
                            <th>Presión mínima:</th>
                            <td><?php echo min(array($datos['presion'])); ?></td>
                        </tr>
                        <tr>
                            <th>Presión media:</th>
                            <td><?php echo $presionMedia; ?></td>
                        </tr>
                    </table>
                    <hr>
                    <input id="salir" type="submit" value="Salir" name="salir"/>
    <?php
}
?>
                </body>
                </html>