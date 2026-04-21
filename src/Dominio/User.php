<?php

namespace App\Dominio;

class User
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $rol;
    private string $creado_en;

    public function __construct(string $nombre, string $email, string $rol, string $creado_en, ?int $id = null)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->rol = $rol;
        $this->creado_en = $creado_en;
        $this->id = $id ?? 0;
    }
    private static function arrayToUser(array $row): User
    {
        return new User(
            nombre: $row['nombre'],
            email: $row['email'],
            rol: $row['rol'],
            creado_en: $row['creado_en'],
            id: (int)$row['id']
        );
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getRol(): string
    {
        return $this->rol;
    }
    public function getCreadoEn(): string
    {
        return $this->creado_en;
    }
}
