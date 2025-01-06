<?php

require_once "app/models/AlojamientoModel.php";

class AlojamientoController
{
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Datos del formulario
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $direccion = $_POST['direccion'];
            $precio = $_POST['precio'];
            $imagen = $_FILES['imagen'] ?? null;
            $departamento = $_POST['departamento'];
            $minpersona = $_POST['minpersona'];
            $maxpersona = $_POST['maxpersona'];

            // Procesamiento de la imagen
            if ($imagen && $imagen['error'] === 0) {

                // Definir la carpeta de destino para las imágenes a "uploads"
                $destino = 'public/uploads/';
                $nombreImagen = basename($imagen['name']);
                $rutaDestino = $destino . $nombreImagen;                  //Destino para que cada imagen se guarde en uploads
                $rutaDestinoDB = "../../public/uploads/" . $nombreImagen; //Destino que sera guardado en la DB para que aparezcan las imagenes
                $rutaDestinoDetalle = "../public/uploads/" . $nombreImagen; //Destino que sera guardado en la DB para que aparezcan las imagenes

                // Mover el archivo a la carpeta "uploads"
                if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {

                    // Llamada al modelo para guardar el alojamiento y la ruta de la imagen
                    $alojamiento = new AlojamientoModel();
                    $resultado = $alojamiento->createAlojamiento($nombre, $descripcion, $direccion, $precio, $rutaDestinoDB, $minpersona, $maxpersona, $departamento);

                    if ($resultado) { //Si el resultado fue exitoso
                        header('Location:/Alojamientos_app_PHP/home/index/');
                        exit();
                    } else {
                        echo "Hubo un error al guardar el alojamiento.";
                    }
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            require_once 'app/views/create_alojamiento.php';
        }
    }

    public function getAlojamiento()
    {
        // Verificacion de recibimiento del ID
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Obtencion de los datos del alojamiento desde el modelo
            $alojamientoModel = new AlojamientoModel();
            $alojamiento = $alojamientoModel->obtenerAlojamientoPorId($id);

            if (!$alojamiento) {
                echo "El alojamiento no existe.";
                return;
            }

            // Cargar la vista con los detalles del alojamiento
            require_once 'app/views/detalles_alojamiento.php';
        } else {
            echo "ID no proporcionado.";
        }
    }
}
