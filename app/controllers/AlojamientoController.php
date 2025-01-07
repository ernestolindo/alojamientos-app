<?php

require_once "app/models/AlojamientoModel.php";

class AlojamientoController
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        require_once 'app/views/create_alojamiento.php'; // Renderiza el formulario
    }

    // Método para procesar el formulario y guardar el alojamiento
    public function create_crud()
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
                $rutaBase = '/Alojamientos_app_PHP/public/uploads/';
                $nombreImagen = basename($imagen['name']);
                $rutaDestino = "public/uploads/" . $nombreImagen; // Destino que será guardado en la DB para que aparezcan las imágenes
                $rutaDestinoDB = $rutaBase . $nombreImagen;       // Destino para que cada imagen se guarde en uploads

                // Mover el archivo a la carpeta "uploads"
                if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {

                    // Llamada al modelo para guardar el alojamiento y la ruta de la imagen
                    $alojamiento = new AlojamientoModel();
                    $resultado = $alojamiento->createAlojamiento($nombre, $descripcion, $direccion, $precio, $rutaDestinoDB, $minpersona, $maxpersona, $departamento);

                    if ($resultado) { // Si el resultado fue exitoso
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
            echo "Acceso no permitido.";
        }
    }

    public function getAlojamiento()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Obtencion de los datos a partir del modelo
            $alojamientoModel = new AlojamientoModel();
            $alojamiento = $alojamientoModel->obtenerAlojamientoPorId($id);

            if (!$alojamiento) {
                echo "El alojamiento no existe.";
                return;
            }

            //Carga de la vista con los detalles del alojamiento
            require_once 'app/views/detalles_alojamiento.php';
        } else {
            echo "ID no proporcionado.";
        }
    }
}
