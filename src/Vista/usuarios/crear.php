<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>

<body>
    <h1>Crear Usuario</h1>

    <?php if (!empty($mensaje)): ?>
        <p style="color: green;"><?= htmlspecialchars($mensaje) ?></p>
    <?php else: ?>
        <form action="<?= \App\Config\Settings::getUrlBase() ?>usuario/crear" method="POST">
            <label>Nombre:<br>
                <input type="text" name="nombre" required>
            </label><br><br>

            <label>Email:<br>
                <input type="email" name="email" required>
            </label><br><br>

            <label>Rol:<br>
                <select name="rol">
                    <option value="Admin">Admin</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </label><br><br>

            <button type="submit">Crear usuario</button>
        </form>
    <?php endif; ?>

    <p><a href="<?= \App\Config\Settings::getUrlBase() ?>">Volver al menú</a></p>
</body>

</html>