<?php

require_once "app/models/UsuarioModel.php";

class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        // Crear una instancia del modelo de Usuario
        $this->usuarioModel = new UsuarioModel();
    }

    // Función para manejar el registro
    public function register()
    {
        // Aquí implementarás la lógica del registro
    }

    // Función para manejar el inicio de sesión
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Mostrar el formulario
            require_once "app/views/login.php";
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Procesar los datos enviados
            $correo = $_POST['correo'] ?? '';
            $contrasenia = $_POST['contrasenia'] ?? '';

            if (empty($correo) || empty($contrasenia)) {
                echo "Por favor llena todos los campos.";
                return;
            }

            $usuario = $this->usuarioModel->verificarCredenciales($correo, $contrasenia);

            if ($usuario) {

                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['tipo'] = $usuario['tipo'];

                header("Location: /Alojamientos_app_PHP/home/index/");
                exit();
            } else {
                echo "Credenciales incorrectas.";
            }
        }
    }

    // Función para manejar el cierre de sesión
    public function logout()
    {
        // Aquí implementarás la lógica para cerrar la sesión
    }
}
