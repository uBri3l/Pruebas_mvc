<?php

namespace App\Controller;

use ActualizarUsuario;
use App\Aplicacion\BuscarUsuario;
use App\Core\View;
use Exception;

class UsuarioController
{
    public function nuevo()
    {
        require_once 'src/Vista/usuarios/nuevo.php';
    }
    public function buscar($id)
    {
        $repo = null;
        try {
            $repo = new BuscarUsuario();
            $usuario = $repo->ejecutar($id);
            View::render('usuarios/buscar', ['usuario' => $usuario]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al obtener el usuario',
                'mensaje' => $e->getMessage(),
            ]);
        }
    }
    public function crear()
    {
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $rol = $_POST['rol'] ?? '';
        $creado_en = $_POST['creado_en'] ?? '';
        $repo = null;
        try {
            $repo = new \App\Infraestructura\UsuarioRepositorio(new \PDO('sqlite:database.sqlite'));
            $crearUsuario = new \App\Aplicacion\CrearUsuario($repo);
            $crearUsuario->ejecutar($nombre, $email, $rol, $creado_en);
            View::render('mensaje/comun.php', [
                'titulo' => 'Usuario creado',
                'mensaje' => 'El usuario ha sido creado exitosamente.',
            ]);
        } catch (Exception $e) {
            View::render('mensaje/comun.php', [
                'titulo' => 'Error al crear el usuario',
                'mensaje' => $e->getMessage(),
            ]);
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
