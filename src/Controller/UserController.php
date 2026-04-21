<?php

namespace App\Controller;

use App\Core\View;
use App\Dominio\User;
use Exception;

class UserController
{
    public function buscar($id)
    {
        // View::render('usuario/listar', ['nombre' => $nombre]);

        $usuario = [];
        try {
            // $usuario = new User(
            //     nombre: 'Juan Perez',
            //     email: 'juan.perez@example.com',
            //     rol: 'admin',
            //     creado_en: '2024-06-01 12:00:00'
            // );
            $usuario = User::buscarUsuario($id);
            View::render('users/buscar', ['usuario' => $usuario]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al obtener el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
}
