<?php

require_once "app/models/UseralojamientoModel.php";

class UseralojamientoController
{
    public function mostrarFavoritos($id_usuario)
    {
        session_start();
        $id_usuario = $_SESSION['usuario_id'];

        // Se obtiene los alojamientos favoritos del usuario
        $alojamientoModel = new UseralojamientoModel();
        $alojamientosFav = $alojamientoModel->obtenerAlojamiento_favorito($id_usuario);
        require_once "app/views/usuario_favoritos.php";
    }

    //Funcion en la que el usuario puede elegir alojamientos (LLevado a cabo con la tematica de "favoritos")
    public function add_favorito()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            require_once 'app/views/usuario_favoritos.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id_usuario = $_POST['id_usuario'];
            $id_alojamiento = $_POST['id_alojamiento'];

            if (!$id_usuario || !$id_alojamiento) {
                echo "Datos inválidos. Por favor, revisa la información.";
                return;
            }

            $alojamiento = new UseralojamientoModel();
            $resultado = $alojamiento->add_favorito($id_usuario, $id_alojamiento);

            if ($resultado) {
                header('Location: /Alojamientos_app_PHP/Useralojamiento/add_favorito/');
            } else {
                echo "Hubo un error para agregar este alojamiento a favoritos";
            }
        }
    }

    public function delete_favorito() {}
}
