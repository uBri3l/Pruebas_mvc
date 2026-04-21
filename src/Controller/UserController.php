<?php

namespace App\Controller;

use App\Aplicacion\BuscarUsuario;
use App\Core\View;
use Exception;

class UserController
{
    public function buscar($id)
    {
        // View::render('usuario/listar', ['nombre' => $nombre]);

        $repo = null;
        try {
            // $usuario = new User(
            //     nombre: 'Juan Perez',
            //     email: 'juan.perez@example.com',
            //     rol: 'admin',
            //     creado_en: '2024-06-01 12:00:00'
            // );
            $repo = new BuscarUsuario();
            $user = $repo->ejecutar($id);
            View::render('users/buscar', ['usuario' => $user]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al obtener el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
}
