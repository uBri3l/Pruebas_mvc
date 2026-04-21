<?php

namespace App\Dominio;

use App\Core\Conexion;
use PDOException;

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
    static function buscarUsuario(int $id): ?User
    {

        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "SELECT id, nombre, email, rol, creado_en FROM usuarios WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($row) {
                return new User($row['nombre'], $row['email'], $row['rol'], $row['creado_en'], (int)$row['id']);
            }
            return null;
        } catch (PDOException $e) {
            error_log("Error al obtener usuario: " . $e->getMessage());
            return null;
        } finally {
            $stmt = null;
            $pdo = null;
        }
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
