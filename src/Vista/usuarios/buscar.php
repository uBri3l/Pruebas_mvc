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

    if (!isset($usuario)): ?>
        <form action="<?= Settings::getUrlBase() ?>usuario/buscar" method="POST">
            <label>ID del usuario:<br>
                <input type="number" name="id" min="1" required>
            </label><br><br>
            <button type="submit">Buscar</button>
        </form>

        <p><a href="<?= Settings::getUrlBase() ?>">Volver al menú</a></p>

    <?php elseif ($usuario !== false): ?>
        <p>Usuario encontrado.</p>
        Nombre: <?= htmlspecialchars($usuario->getNombre()) ?><br>
        E-mail: <?= htmlspecialchars($usuario->getEmail()) ?><br>
        Rol: <?= htmlspecialchars($usuario->getRol()) ?><br>
        Creado en: <?= htmlspecialchars($usuario->getCreadoEn()) ?><br>

        <p><a href="<?= Settings::getUrlBase() ?>usuario/editar/<?= $usuario->getId() ?>">Editar usuario</a></p>
        <p><a href="<?= Settings::getUrlBase() ?>usuario/buscar">Volver a la búsqueda</a></p>

    <?php else: ?>
        <p>No se encontró el usuario.</p>
        <p><a href="<?= Settings::getUrlBase() ?>usuario/buscar">Volver a la búsqueda</a></p>

    <?php endif; ?>

</body>

</html>