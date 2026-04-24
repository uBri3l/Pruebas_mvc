<?php

use App\Config\Settings;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Autos</title>
</head>

<body>
    <h1><?= $titulo ?></h1>
    <p><?= $mensaje ?></p>
    <p><a href="<?= Settings::getUrlBase() ?>">Volver al menú</a></p>
</body>

</html>