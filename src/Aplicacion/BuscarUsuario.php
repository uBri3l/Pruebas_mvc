<?php

namespace App\Aplicacion;

use App\Infraestructura\UsuarioRepositorio;

class BuscarUsuario
{
    
    public function __construct()
    {
       
    }
    public function ejecutar(int $id)
    {
       $user= UsuarioRepositorio::buscarUsuario($id);
    }
}
