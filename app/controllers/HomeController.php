<?php
require_once "app/models/AlojamientoModel.php";

class HomeController
{
    public function index()
    {

        session_start();

        // Verificar si hay una sesión activa
        if (isset($_SESSION['usuario_id'])) {
            // Obtener datos de la sesión
            $nombre = $_SESSION['nombre'];
            $tipo = $_SESSION['tipo'];
        }



        // Obtener todos los alojamientos
        $model = new AlojamientoModel();
        $alojamientos = $model->readAlojamientos();
        require_once "app/views/home.php";
    }
}
