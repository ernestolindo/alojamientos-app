<?php
require_once "app/models/AlojamientoModel.php";

class HomeController
{
    public function index()
    {
        $model = new AlojamientoModel();

        // Obtener todos los alojamientos
        $alojamientos = $model->readAlojamientos();
        require_once "app/views/home.php";
    }
}
