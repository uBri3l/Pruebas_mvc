<?php

namespace App\Aplicacion;

use App\Dominio\Usuario;

class BuscarUsuario
{
    private $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function ejecutar(int $id): ?Usuario
    {
        return $this->repo->buscarUsuario($id);
    }
}
