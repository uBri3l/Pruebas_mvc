<?php

namespace App\Aplicacion;

use App\Dominio\Usuario;

class CrearUsuario
{
    private $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function ejecutar($nombre, $email, $rol, $creado_en, $id = null)
    {
        $usuario = new Usuario($nombre, $email, $rol, $creado_en, $id);
        return $this->repo->guardar($usuario);
    }
}
