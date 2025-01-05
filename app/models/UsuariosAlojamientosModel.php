<?php
require_once "config/Database.php";

class UsuariosAlojamientosModel
{
    private $db; // Variable para almacenar la conexión PDO

    public function __construct()
    {
        // Crear una instancia de la clase Database y obtener la conexión
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Función para asignar un alojamiento a un usuario (CREATE)
    public function createUsuarioAlojamiento($usuario_id, $alojamiento_id)
    {
        $query = "INSERT INTO usuarios_alojamientos (usuario_id, alojamiento_id) 
                  VALUES (:usuario_id, :alojamiento_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":usuario_id", $usuario_id);
        $stmt->bindParam(":alojamiento_id", $alojamiento_id);
        return $stmt->execute();
    }

    // Función para obtener todos los registros (READ)
    public function readUsuariosAlojamientos()
    {
        $query = "SELECT * FROM usuarios_alojamientos"; // Consulta SQL
        $stmt = $this->db->prepare($query); // Preparar la consulta
        $stmt->execute(); // Ejecutar la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver los resultados como un arreglo asociativo
    }

    // Función para obtener registros específicos por usuario_id (READ)
    public function obtenerAlojamientosPorUsuario($usuario_id)
    {
        $query = "SELECT 
                      a.id AS alojamiento_id, 
                      a.nombre AS nombre_alojamiento, 
                      a.descripcion, 
                      a.precio
                  FROM 
                      usuarios_alojamientos ua
                  JOIN 
                      alojamientos a ON ua.alojamiento_id = a.id
                  WHERE 
                      ua.usuario_id = :usuario_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":usuario_id", $usuario_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para actualizar la relación entre usuario y alojamiento (UPDATE)
    public function updateUsuarioAlojamiento($usuario_id, $alojamiento_id, $nuevo_alojamiento_id)
    {
        $query = "UPDATE usuarios_alojamientos 
                  SET alojamiento_id = :nuevo_alojamiento_id
                  WHERE usuario_id = :usuario_id AND alojamiento_id = :alojamiento_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":usuario_id", $usuario_id);
        $stmt->bindParam(":alojamiento_id", $alojamiento_id);
        $stmt->bindParam(":nuevo_alojamiento_id", $nuevo_alojamiento_id);
        return $stmt->execute();
    }

    // Función para eliminar una relación entre usuario y alojamiento (DELETE)
    public function deleteUsuarioAlojamiento($usuario_id, $alojamiento_id)
    {
        $query = "DELETE FROM usuarios_alojamientos 
                  WHERE usuario_id = :usuario_id AND alojamiento_id = :alojamiento_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":usuario_id", $usuario_id);
        $stmt->bindParam(":alojamiento_id", $alojamiento_id);
        return $stmt->execute();
    }
}
