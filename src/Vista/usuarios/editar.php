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
                <option value="admin" <?= $usuario->getRol() === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= $usuario->getRol() === 'user'  ? 'selected' : '' ?>>User</option>
            </select>
        </label><br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <p><a href="<?= \App\Config\Settings::getUrlBase() ?>usuario/buscar/<?= $usuario->getId() ?>">Cancelar</a></p>
</body>

</html>