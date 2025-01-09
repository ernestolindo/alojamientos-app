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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            // Mostrar el formulario de registro
            require_once "app/views/registro.php"; 

        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Procesar los datos enviados por el formulario
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $contrasenia = $_POST['contrasenia'] ?? '';
            $tipo = $_POST['tipo'] ?? 'usuario';

            // Verificar si el correo ya está registrado
            $usuarioExistente = $this->usuarioModel->obtenerUsuarioPorCorreo($correo);
            if ($usuarioExistente) {
                echo "El correo ya está registrado.";
                return;
            }

            // Hash de la contraseña
            $contraseniaHash = password_hash($contrasenia, PASSWORD_DEFAULT);

            // Registrar el nuevo usuario
            $registrado = $this->usuarioModel->registrarUsuario($nombre, $correo, $contraseniaHash, $tipo);

            if ($registrado) {
                echo "Registro exitoso. Ahora puedes iniciar sesión.";
                header("Location: /Alojamientos_app_PHP/auth/login/");
                exit();
            } else {
                echo "Hubo un problema al registrar el usuario. Por favor intenta de nuevo.";
            }
        }
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

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /Alojamientos_app_PHP/home/index/");
        exit();
    }
}
