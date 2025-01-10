<?php

require_once "app/models/UseralojamientoModel.php";

class UseralojamientoController
{
    //Funcion en la que el usuario puede elegir alojamientos (LLevado a cabo con la tematica de "favoritos")
    public function add_favorito()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") { //Si solo se quiere ingresar a la seccion de favoritos

            session_start();

            $id_usuario = $_SESSION['usuario_id'];

            $alojamiento_user = new UseralojamientoModel();
            $favoritos = $alojamiento_user->obtenerAlojamiento_favorito($id_usuario);

            require_once 'app/views/usuario_favoritos.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === "POST") { //Si se quiere agregar un favorito

            $alojamiento_user = new UseralojamientoModel();

            $id_usuario = $_POST['id_usuario'];
            $id_alojamiento = $_POST['id_alojamiento'];

            //Validacion de los campos
            if (!$id_usuario || !$id_alojamiento) {
                echo "Datos inválidos. Por favor, revisa la información.";
                return;
            }

            //Validacion para no duplicar favoritos
            if ($alojamiento_user->existeRegistro($id_alojamiento, $id_alojamiento)) {
                echo "El alojamiento ya está en favoritos.";
                
            } else {

                $resultado = $alojamiento_user->add_favorito($id_usuario, $id_alojamiento);

                if ($resultado) {
                    header('Location: /Alojamientos_app_PHP/Useralojamiento/add_favorito/');
                } else {
                    echo "Hubo un error para agregar este alojamiento a favoritos";
                }
            }
        }
    }

    public function delete_favorito()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $id_usuario = $_POST['id_usuario'];
            $id_alojamiento = $_POST['id_alojamiento'];

            $alojamiento_user = new UseralojamientoModel();
            $resultado = $alojamiento_user->deleteAlojamiento_usuario($id_usuario, $id_alojamiento);

            if ($resultado) {
                header('Location: /Alojamientos_app_PHP/Useralojamiento/add_favorito/');
            } else {
                echo "Error al eliminar alojamiento favorito.";
            }
        } else {
            echo "Error al enviar la informacion";
        }
    }
}
