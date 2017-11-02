<!DOCTYPE html>

<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Práctica 2</title>
	<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  </head>
  <body>

<?php
$str = <<<EOD
Ejemplo de una cadena
expandida en varias líneas
empleando la sintaxis heredoc.
EOD;

class foo
{
    var $foo;
    var $bar;

    function foo()
    {
        $this->foo = 'texto';
        $this->bar = array('texto', 'texto', 'texto');
    }
}

$foo = new foo();
$nombre = 'Pablo';

echo <<<EOT
Mi nombre es "$nombre".
Ahora, estoy escribiendo un poco de {$foo->bar[1]}.
Esto debería mostrar una 'A' mayúscula: \x41
EOT;
?>
</body>
</html>