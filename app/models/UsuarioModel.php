<?php
require_once "config/Database.php";

class UsuarioModel
{
    private $db; // Variable para almacenar la conexión PDO

    public function __construct()
    {
        // Crear una instancia de la clase Database y obtener la conexión
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Función para agregar un usuario
    public function registrarUsuario($nombre, $correo, $contrasenia, $tipo)
    {
        $query = "INSERT INTO usuarios (nombre, correo, contrasenia, tipo) 
                  VALUES (:nombre, :correo, :contrasenia, :tipo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":contrasenia", $contrasenia); // Asegúrate de hashear la contraseña antes de almacenarla
        $stmt->bindParam(":tipo", $tipo);
        return $stmt->execute();
    }

    // Función para obtener todos los usuarios
    public function readUsuarios()
    {
        $query = "SELECT * FROM usuarios"; // Consulta SQL
        $stmt = $this->db->prepare($query); // Preparar la consulta
        $stmt->execute(); // Ejecutar la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver los resultados como un arreglo asociativo
    }

    // Función para obtener los detalles de un usuario específico
    public function obtenerUsuarioPorId($id)
    {
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Función para obtener los detalles de un usuario específico
    public function obtenerUsuarioPorCorreo($correo)
    {
        $query = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Función para editar un usuario
    public function editUsuario($id, $nombre, $correo, $contrasenia, $tipo)
    {
        $query = "UPDATE usuarios 
                  SET nombre = :nombre, correo = :correo, contrasenia = :contrasenia, tipo = :tipo
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":contrasenia", $contrasenia);
        $stmt->bindParam(":tipo", $tipo);
        return $stmt->execute();
    }

    // Función para eliminar un usuario
    public function deleteUsuario($id)
    {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function verificarCredenciales($correo, $contrasenia)
    {
        $query = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":correo", $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contrasenia, $usuario['contrasenia'])) {
            return $usuario;
        }

        return false;
    }
}
