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
        $query = "SELECT a.id, a.nombre, a.descripcion, a.direccion, a.precio, a.imagen, a.minpersona, a.maxpersona, a.departamento
            FROM usuarios_alojamientos ua
            JOIN alojamientos a
            ON ua.alojamiento_id = a.id
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
}
