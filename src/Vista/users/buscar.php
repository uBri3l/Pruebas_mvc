<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Busqueda de Usuarios</title>
</head>

<body>
    <h1>Busqueda de Usuarios</h1>
    <?php

    use App\Config\Settings;
    
    if (!empty($user)): ?>
        <p>Usuario encontrado.</p>
        nombre: <?= $user->getNombre() ?><br>
        email: <?= $user->getEmail() ?><br>
        rol: <?= $user->getRol() ?><br>
        creado en: <?= $user->getCreadoEn() ?><br>

    <?php else: ?>
        <p>No se encontró el usuario.</p>
    <?php endif; ?>
    <p><a href="<?= Settings::getUrlBase()  ?>">Volver al menú</a></p>
</body>

</html>