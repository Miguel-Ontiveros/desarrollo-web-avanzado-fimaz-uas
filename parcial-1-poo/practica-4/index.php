<?php

spl_autoload_register(function($clase) {
    $ruta = __DIR__ . '/clases/' . $clase . '.php';
    require $ruta;
});

$usuarios = [];
$error = "";

try {

    // Admin válido
    $admin = new Admin("Carlos", "carlos@empresa.com");
    $usuarios[] = $admin;

    // Alumno válido
    $alumno = new Alumno("Ana", "ana@universidad.com", "A12345");
    $usuarios[] = $alumno;

    // Invitado válido
    $invitado = new Invitado("Laura", "laura@empresa.com", "TechCorp");
    $usuarios[] = $invitado;

    // Registro inválido (correo incorrecto)
    $invalido = new Usuario("Pedro", "correo_mal");
    $usuarios[] = $invalido;

} catch (Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Usuarios</title>
</head>
<body>

<h2>Lista de Usuarios</h2>

<?php
if ($error) {
    echo "<p style='color:red;'>Error controlado: $error</p>";
}
?>

<table border="1" cellpadding="8">
<tr>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Rol</th>
    <th>Matrícula</th>
    <th>Empresa</th>
</tr>

<?php foreach ($usuarios as $u): ?>

<tr>

<td><?php echo $u->getNombre(); ?></td>
<td><?php echo $u->getCorreo(); ?></td>
<td><?php echo $u->getRol(); ?></td>

<td>
<?php
if ($u instanceof Alumno) {
    echo $u->getMatricula();
} else {
    echo "—";
}
?>
</td>

<td>
<?php
if ($u instanceof Invitado) {
    echo $u->getEmpresa();
} else {
    echo "—";
}
?>
</td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>