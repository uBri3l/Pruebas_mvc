<?php

namespace App\Aplicacion;

use App\Dominio\Usuario;
use App\Infraestructura\UsuarioRepositorio;

class ActualizarUsuario
{
    private $repo;

    public function __construct()
    {
        $this->repo = new UsuarioRepositorio();
    }

    public function ejecutar(Usuario $usuario)
    {
        return $this->repo->actualizar($usuario);
    }
}
