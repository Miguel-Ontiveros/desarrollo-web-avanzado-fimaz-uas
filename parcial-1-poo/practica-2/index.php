<?php

spl_autoload_register(function($clase) {
    $ruta =__DIR__ .'/'. str_replace('\\', '/', $clase) . '.php';
    require $ruta;
});

$Usuario = new Usuario("Juan", "juan@email.com");
$Admin = new Admin("Administrador");

echo $Usuario->getNombre() . " tiene el correo " . $Usuario->getCorreo() . ", con el rol de " . $Admin->getRol();

?>