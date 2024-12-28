<?php
require_once APP_ROOT . "models/AlojamientoModel.php";

class HomeController
{
    public function index()
    {
        $model = new AlojamientoModel();

        // Obtener todos los alojamientos
        $alojamientos = $model->readAlojamientos();

        echo "<pre>";
        print_r($alojamientos);  // Ver los alojamientos en el navegador
        echo "</pre>";

        // Enviar los datos a la vista
        // require_once "../app/views/home.php";
    }
}
