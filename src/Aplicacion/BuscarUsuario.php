<?php

namespace App\Aplicacion;

use App\Dominio\Usuario;
use App\Infraestructura\UsuarioRepositorio;

class BuscarUsuario
{
    private $repo;

    public function __construct()
    {
        $this->repo = new UsuarioRepositorio();
    }

    public function ejecutar(int $id): ?Usuario
    {
        return $this->repo->buscarUsuario($id);
    }
}
