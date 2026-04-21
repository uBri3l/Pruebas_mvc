<?php

namespace App\Infraestructura;

use App\Core\Conexion;
use App\Dominio\User;
use PDOException;

class UsuarioRepositorio
{
    public function __construct()
    {
        
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
}
