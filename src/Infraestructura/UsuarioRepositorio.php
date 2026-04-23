<?php

namespace App\Infraestructura;

use App\Core\Conexion;
use App\Dominio\Usuario;
use PDO;
use PDOException;

class UsuarioRepositorio
{
    public function guardar(Usuario $usuario)
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "INSERT INTO usuarios (nombre, email, rol, creado_en) VALUES (:nombre, :email, :rol, :creado_en)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':rol', $usuario->getRol(), PDO::PARAM_STR);
            $stmt->bindParam(':creado_en', $usuario->getCreadoEn(), PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al guardar usuario: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }
    static function buscarUsuario(int $id): ?Usuario
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
                return new Usuario($row['nombre'], $row['email'], $row['rol'], $row['creado_en'], (int)$row['id']);
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
    public function actualizar(Usuario $usuario)
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, rol = :rol, creado_en = :creado_en WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':rol', $usuario->getRol(), PDO::PARAM_STR);
            $stmt->bindParam(':creado_en', $usuario->getCreadoEn(), PDO::PARAM_STR);
            $stmt->bindParam(':id', $usuario->getId(), PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al actualizar usuario: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }
}
