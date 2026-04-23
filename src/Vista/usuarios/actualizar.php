<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Usuario</h1>
        <form method="POST" action="/usuarios/guardar">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" readonly value="<?php echo htmlspecialchars($usuario['id'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($usuario['nombre'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono'] ?? ''); ?>">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">Guardar Cambios</button>
                <a href="/usuarios" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>