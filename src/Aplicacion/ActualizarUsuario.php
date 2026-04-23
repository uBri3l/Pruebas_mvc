<?php
Class ActualizarUsuario
{
    private $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function ejecutar($id, $nombre, $email, $rol, $creado_en)
    {
        $usuario = new \App\Dominio\Usuario($nombre, $email, $rol, $creado_en, $id);
        return $this->repo->actualizar($usuario);
    }
}