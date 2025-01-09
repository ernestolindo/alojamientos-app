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
    public function createAlojamiento($nombre, $descripcion, $direccion, $precio, $imagen, $minpersona, $maxpersona, $departamento)
    {
        $query = "INSERT INTO alojamientos (nombre, descripcion, direccion, precio, imagen, minpersona, maxpersona, departamento) 
                  VALUES (:nombre, :descripcion, :direccion, :precio, :imagen, :minpersona, :maxpersona, :departamento)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":minpersona", $minpersona);
        $stmt->bindParam(":maxpersona", $maxpersona);
        $stmt->bindParam(":departamento", $departamento);
        return $stmt->execute();
    }

    // Función para obtener todos los alojamientos
    public function readAlojamientos()
    {
        $query = "SELECT * FROM alojamientos";  // Consulta SQL
        $stmt = $this->db->prepare($query);     // Preparar la consulta
        $stmt->execute();                       // Ejecutar la consulta
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
    public function editAlojamiento($id, $nombre, $descripcion, $direccion, $precio, $imagen, $minpersona, $maxpersona, $departamento)
    {
        $query = "UPDATE alojamientos 
                  SET nombre = :nombre, descripcion = :descripcion, direccion = :direccion, precio = :precio, imagen = :imagen, minpersona = :minpersona, maxpersona = :maxpersona, departamento = :departamento
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":minpersona", $minpersona);
        $stmt->bindParam(":maxpersona", $maxpersona);
        $stmt->bindParam(":departamento", $departamento);
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

    // Funcion para agregar favoritos por un usuario
    public function add_favorito($id_usuario, $id_alojamiento)
    {
        $query = "INSERT INTO usuarios_alojamientos (usuario_id, alojamiento_id) VALUES (:usuario_id, :alojamiento_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $id_usuario);
        $stmt->bindParam(':alojamiento_id', $id_alojamiento);
        return $stmt->execute();
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
