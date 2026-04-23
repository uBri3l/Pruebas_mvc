<?php

namespace App\Aplicacion;

class CrearUsuario {
    private $repo;

    public function __construct($repo) {
        $this->repo = $repo;
    }

    public function ejecutar($nombre, $email, $rol, $creado_en, $id = null) {
        $usuario = new \App\Dominio\Usuario($nombre, $email, $rol, $creado_en, $id);
        return $this->repo->guardar($usuario);
    }
}