<?php

namespace App\Controller;

use ActualizarUsuario;
use App\Aplicacion\BuscarUsuario;
use App\Aplicacion\CrearUsuario;
use App\Core\View;
use App\Infraestructura\UsuarioRepositorio;
use Exception;

class UsuarioController
{
    public function buscar($id = null)
    {
        try {

            if ($id === null) {
                View::render('usuarios/buscar', []);
                return;
            }
            $repo = new UsuarioRepositorio();
            $buscarUsuario = new BuscarUsuario($repo);
            $usuario = $buscarUsuario->ejecutar((int)$id);
            View::render('usuarios/buscar', ['usuario' => $usuario ?? false]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al obtener el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lógica de creación
            $nombre    = $_POST['nombre']     ?? '';
            $email     = $_POST['email']      ?? '';
            $rol       = $_POST['rol']        ?? '';
            $creado_en = date('Y-m-d H:i:s');

            try {
                $repo          = new UsuarioRepositorio();
                $crearUsuario  = new CrearUsuario($repo);
                $crearUsuario->ejecutar($nombre, $email, $rol, $creado_en);

                View::render('usuarios/crear', [
                    'titulo'  => 'Usuario creado',
                    'mensaje' => 'El usuario ha sido creado exitosamente.',
                ]);
            } catch (Exception $e) {
                View::render('mensaje/comun.php', [
                    'titulo'  => 'Error al crear el usuario',
                    'mensaje' => $e->getMessage(),
                ]);
            }
        } else {
            // GET → solo mostrar el formulario vacío
            View::render('usuarios/crear', []);
        }
    }
    public function editar($id)
    {
        $repo = null;
        try {
            $repo = new BuscarUsuario();
            $usuario = $repo->ejecutar($id);
            View::render('usuarios/editar', ['usuario' => $usuario]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al obtener el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
    public function actualizar($id)
    {
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $rol = $_POST['rol'] ?? '';
        $creado_en = $_POST['creado_en'] ?? '';
        $repo = null;
        try {
            return (new ActualizarUsuario($repo))->ejecutar($id, $nombre, $email, $rol, $creado_en);
            View::render('mensaje/comun.php', [
                'titulo' => 'Usuario actualizado',
                'mensaje' => 'El usuario ha sido actualizado exitosamente.',
            ]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al actualizar el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
}
