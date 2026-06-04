
<?php
/* este fragmento de codigo php esta generando un hash para la contraseña 'admin123' usando la función
`password_hash` con el algoritmo `PASSWORD_DEFAULT`. Luego, muestra el hash generado y su longitud.
El comentario indica que la longitud del hash debe ser de 60 caracteres. */
$hash = password_hash('admin123', PASSWORD_DEFAULT);
echo $hash;
echo "\n";
echo "Longitud: " . strlen($hash); // debe ser 60
?>