<?php

use App\Config\Settings;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>

<body>
    <h1>Crear Usuario</h1>
    <form action="<?= Settings::getUrlBase() ?>usuario/crear" method="POST">
        <label>Nombre:<br>
            <input type="text" name="nombre" required>
        </label><br><br>

        <label>E-mail:<br>
            <input type="email" name="email" required>
        </label><br><br>

        <label>Rol:<br>
            <select name="rol">
                <option value="Admin">Admin</option>
                <option value="Usuario">Usuario</option>
                <option value="Gestor de Base de Datos">Gestor de Base de Datos</option>
                <option value="Tester">Tester</option>
            </select>
        </label><br><br>

        <button type="submit">Crear usuario</button>
    </form>
    <p><a href="<?= Settings::getUrlBase() ?>">Volver al menú</a></p>
</body>

</html>