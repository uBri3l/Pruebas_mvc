<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>

<body>
    <h1>Editar Usuario</h1>

    <form action="<?= \App\Config\Settings::getUrlBase() ?>usuario/actualizar/<?= $usuario->getId() ?>" method="POST">
        <label>ID (no editable):<br>
            <input type="number" value="<?= $usuario->getId() ?>" disabled>
        </label><br><br>

        <label>Nombre:<br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($usuario->getNombre()) ?>" required>
        </label><br><br>

        <label>Email:<br>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario->getEmail()) ?>" required>
        </label><br><br>

        <label>Rol:<br>
            <select name="rol">
                <option value="Admin" <?= $usuario->getRol() === 'Admin' ? 'selected' : '' ?>>Admin</option>
                <option value="Usuario" <?= $usuario->getRol() === 'Usuario'  ? 'selected' : '' ?>>Usuario</option>
                <option value="Gestor de base de datos" <?= $usuario->getRol() === 'Gestor de Base de Datos' ? 'selected' : '' ?>>Gestor de Base de Datos</option>
                <option value="Tester" <?= $usuario->getRol() === 'Tester' ? 'selected' : '' ?>>Tester</option>
            </select>
        </label><br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <p><a href="<?= \App\Config\Settings::getUrlBase() ?>usuario/buscar/<?= $usuario->getId() ?>">Cancelar</a></p>
</body>

</html>