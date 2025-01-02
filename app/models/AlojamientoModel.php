<?php
require_once "config/Database.php";

class AlojamientoModel
{
    private $db; // Variable para almacenar la conexión PDO

    public function __construct()
    {
        // Crear una instancia de la clase Database y obtener la conexión
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Función para agregar un alojamiento
    public function createAlojamiento($nombre, $descripcion, $direccion, $precio, $imagen)
    {
        $query = "INSERT INTO alojamientos (nombre, descripcion, direccion, precio, imagen) 
                  VALUES (:nombre, :descripcion, :direccion, :precio, :imagen)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        return $stmt->execute();
    }

    // Función para obtener todos los alojamientos
    public function readAlojamientos()
    {
        $query = "SELECT * FROM alojamientos"; // Consulta SQL
        $stmt = $this->db->prepare($query); // Preparar la consulta
        $stmt->execute(); // Ejecutar la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver los resultados como un arreglo asociativo
    }

    // obtener los detalles de un alojamiento específico
    public function obtenerAlojamientoPorId($id)
    {
        $query = "SELECT * FROM alojamientos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Función para editar un alojamiento
    public function editAlojamiento($id, $nombre, $descripcion, $direccion, $precio, $imagen)
    {
        $query = "UPDATE alojamientos 
                  SET nombre = :nombre, descripcion = :descripcion, direccion = :direccion, 
                      precio = :precio, imagen = :imagen
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        return $stmt->execute();
    }

    // Función para eliminar un alojamiento
    public function deleteAlojamiento($id)
    {
        $query = "DELETE FROM alojamientos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
