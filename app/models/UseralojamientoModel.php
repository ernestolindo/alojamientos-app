<?php
require_once "config/Database.php";

class UseralojamientoModel
{
    private $db;

    public function __construct()
    {
        // Crear una instancia de la clase Database y obtener la conexión
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Funcion para obtener un JOIN con los datos del alojamiento y su relacion con un usuario
    public function obtenerAlojamiento_favorito($id_usuario)
    {
        $query = "SELECT a.*
            FROM usuarios_alojamientos ua
            JOIN alojamientos a ON ua.alojamiento_id = a.id
            WHERE ua.usuario_id = :usuario_id
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $id_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Funcion para agregar favoritos por un usuario
    public function add_favorito($id_usuario, $id_alojamiento)
    {
        $query = "INSERT INTO usuarios_alojamientos (usuario_id, alojamiento_id) VALUES (:usuario_id, :alojamiento_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $id_usuario);
        $stmt->bindParam(':alojamiento_id', $id_alojamiento);
        return $stmt->execute();
    }

    // Función para eliminar un favorito de un usuario
    public function deleteAlojamiento_usuario($id_usuario, $id_alojamiento)
    {
        $query = "DELETE FROM usuarios_alojamientos WHERE usuario_id = :usuario_id AND alojamiento_id = :alojamiento_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":usuario_id", $id_usuario);
        $stmt->bindParam(":alojamiento_id", $id_alojamiento);
        return $stmt->execute();
    }

    //Funcion para verificar si un registro ya se encuentra como favorito
    public function existeRegistro($id_usuario, $id_alojamiento)
    {
        $query = "SELECT 1 FROM usuarios_alojamientos 
              WHERE usuario_id = :usuario_id AND alojamiento_id = :alojamiento_id 
              LIMIT 1"; 
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':alojamiento_id', $id_alojamiento, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
}
