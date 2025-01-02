<?php
require_once "app/models/AlojamientoModel.php";

class HomeController
{
    public function index()
    {
        $model = new AlojamientoModel();

        // Obtener todos los alojamientos
        $alojamientos = $model->readAlojamientos();

        // echo "<pre>";
        // print_r($alojamientos);  // Ver los alojamientos en el navegador
        // echo "</pre>";

        require_once "app/views/home.php";
    }
}
