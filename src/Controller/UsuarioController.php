<?php

namespace App\Controller;

use App\Aplicacion\ActualizarUsuario;
use App\Aplicacion\BuscarUsuario;
use App\Aplicacion\CrearUsuario;
use App\Config\Settings;
use App\Core\View;
use App\Dominio\Usuario;
use App\Infraestructura\UsuarioRepositorio;
use Exception;

class UsuarioController
{
    public function buscar($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        header('Location: ' . Settings::getUrlBase() . 'usuario/buscar/' . (int)$id);
        exit;
        }

        $id = $id ?? ($_GET['id'] ?? null);
        
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
                $usuario = new Usuario(
                    nombre: $nombre,
                    email: $email,
                    rol: $rol,
                    creado_en: $creado_en
                );
                $crearUsuario  = new CrearUsuario();
                $crearUsuario->ejecutar($usuario);

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

            View::render('usuarios/crear', []);
        }
    }
    public function nuevo()
    {
        try {
            View::render('usuarios/nuevo', [
                'titulo' => 'Crear nuevo usuario',
                'mensaje' => 'Complete el formulario para crear un nuevo usuario.',
            ]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al mostrar el formulario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
    public function editar($id = null)
    {
        if ($id === null) {
            View::render('mensaje/comun.php', [
                'titulo'  => 'Error',
                'mensaje' => 'Debe especificar un ID de usuario.',
            ]);
            return;
        }

        try {
            $repo    = new UsuarioRepositorio();
            $buscar  = new BuscarUsuario();
            $usuario = $buscar->ejecutar((int)$id);

            if ($usuario === null) {
                View::render('mensaje/comun.php', [
                    'titulo'  => 'Error',
                    'mensaje' => 'Usuario no encontrado.',
                ]);
                return;
            }

            View::render('usuarios/editar', ['usuario' => $usuario]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo'  => 'Error',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
    public function actualizar($id = null)
    {
        if ($id === null || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            View::render('mensaje/comun.php', [
                'titulo'  => 'Error',
                'mensaje' => 'Solicitud inválida.',
            ]);
            return;
        }

        try {
            $nombre = $_POST['nombre'] ?? '';
            $email  = $_POST['email']  ?? '';
            $rol    = $_POST['rol']    ?? '';

            $usuario = new Usuario(
                nombre: $nombre,
                email: $email,
                rol: $rol,
                creado_en: '',
                id: (int)$id
            );

            $repo = new UsuarioRepositorio();
            $actualizarUsuario = new ActualizarUsuario();
            $actualizarUsuario->ejecutar($usuario);

            View::render('usuarios/actualizar', [
                'titulo'  => 'Usuario actualizado',
                'mensaje' => 'El usuario ha sido actualizado exitosamente.',
                'id'      => $id,
            ]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo'  => 'Error al actualizar el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
}
