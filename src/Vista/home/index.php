<?php

use App\Config\Settings; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Gestor de Usuarios</h1>
    <p><a href="<?= Settings::getUrlBase() ?>usuario/buscar">Busqueda de Usuario</a></p>
    <p><a href="<?= Settings::getUrlBase() ?>usuario/nuevo">Creacion de Usuario</a></p>
</body>

</html>