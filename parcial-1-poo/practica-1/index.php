<?php

spl_autoload_register(function($clase) {
    $ruta =__DIR__ .'/'. str_replace('\\', '/', $clase) . '.php';
    require $ruta;
});

$Usuario = new Usuario("Juan", "juan@email.com");

echo $Usuario->getNombre() . " tiene el correo " . $Usuario->getCorreo();


?>