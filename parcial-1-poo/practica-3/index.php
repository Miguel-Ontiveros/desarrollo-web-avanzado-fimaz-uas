<?php

spl_autoload_register(function($clase) {
    $ruta =__DIR__ .'/'. str_replace('\\', '/', $clase) . '.php';
    require $ruta;
});

try {

$Usuario = new Usuario("Juan", "juan@email.com");
$Admin = new Admin("Administrador");

echo $Usuario->getNombre() . " tiene el correo " . $Usuario->getCorreo() . ", con el rol de " . $Admin->getRol();

} catch (Exception $e) {
    echo "Error al crear usuario: " . $e->getMessage() . "<br>";
}

try {
    
    $UsuarioInvalido = new Usuario("Pedro", "correo_invalido");

    echo $UsuarioInvalido->getNombre() . " tiene el correo " . $UsuarioInvalido->getCorreo();

} catch (Exception $e) {
    echo "Error controlado: " . $e->getMessage() . "<br>";
}

?>