<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuario Actualizado</title>
</head>

<body>
    <h1><?= htmlspecialchars($titulo) ?></h1>
    <p><?= htmlspecialchars($mensaje) ?></p>

    <p><a href="<?= \App\Config\Settings::getUrlBase() ?>usuario/buscar/<?= $id ?>">Ver usuario</a></p>
    <p><a href="<?= \App\Config\Settings::getUrlBase() ?>">Volver al menú</a></p>
</body>

</html>