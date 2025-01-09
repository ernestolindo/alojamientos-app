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
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $direccion = trim($_POST['direccion']);
            $precio = $_POST['precio'];
            $imagen = $_FILES['imagen'] ?? null;
            $departamento = trim($_POST['departamento']);
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

    public function update_crud()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            // Instancia del modelo
            $alojamiento = new AlojamientoModel();

            // Datos del formulario
            $idAlojamiento = $_POST['id'];
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $direccion = trim($_POST['direccion']);
            $precio = $_POST['precio'];
            $departamento = trim($_POST['departamento']);
            $minpersona = $_POST['minpersona'];
            $maxpersona = $_POST['maxpersona'];

            // Si el usuario marcó el checkbox de cambio de imagen
            if (!empty($_POST['checkImage']) && $_POST['checkImage'] == 1) {

                $imagen = $_FILES['imagen'] ?? null;

                // Validar que se subió una imagen sin errores
                if ($imagen && $imagen['error'] === 0) {

                    $nombreImagen = basename($imagen['name']);
                    $rutaBase = $_SERVER['DOCUMENT_ROOT'] . '/Alojamientos_app_PHP/public/uploads/';
                    $rutaDestino = $rutaBase . $nombreImagen;
                    $rutaDestinoDB = '/Alojamientos_app_PHP/public/uploads/' . $nombreImagen;

                    // Mover el archivo al destino
                    if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
                        $resultado = $alojamiento->editAlojamiento($idAlojamiento, $nombre, $descripcion, $direccion, $precio, $rutaDestinoDB, $minpersona, $maxpersona, $departamento);

                        if ($resultado) {
                            header('Location: /Alojamientos_app_PHP/Alojamiento/getAlojamiento?id=' . $idAlojamiento);
                            exit();
                        } else {
                            echo "Hubo un error al guardar los datos o la imagen.";
                        }
                    } else {
                        echo "Error al mover el archivo de imagen.";
                    }
                } else {
                    echo "Error al subir la imagen. Verifica el archivo.";
                }
            } else {
                $imagen = $_POST['imgValue'];
                $resultado = $alojamiento->editAlojamiento($idAlojamiento, $nombre, $descripcion, $direccion, $precio, $imagen, $minpersona, $maxpersona, $departamento);

                if ($resultado) {
                    header('Location: /Alojamientos_app_PHP/Alojamiento/getAlojamiento?id=' . $idAlojamiento);
                    exit();
                } else {
                    echo "Hubo un error al guardar el alojamiento.";
                }
            }
        } else {
            echo "Acceso no permitido.";
        }
    }

    public function delete_crud()
    {
        // GET para obtener al alojamiento por su ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idDelete'])) {
            $id = $_POST['idDelete'];

            // Validar que el ID sea un número entero positivo
            if (filter_var($id, FILTER_VALIDATE_INT)) {

                //Ejecucion de la funcion del modelo para eliminar alojamientos
                $alojamientoModel = new AlojamientoModel();
                $resultado = $alojamientoModel->deleteAlojamiento($id);

                if ($resultado) {
                    header('Location: /Alojamientos_app_PHP/home/index/');
                    exit();
                } else {
                    echo "Hubo un error al intentar eliminar el alojamiento.";
                }
            } else {
                echo "ID inválido.";
            }
        } else {
            echo "Acceso no permitido.";
        }
    }

    public function mostrarFavoritos($id_usuario)
    {
        session_start();
        $id_usuario = $_SESSION['usuario_id'];

        // Se obtiene los alojamientos favoritos del usuario
        $alojamientoModel = new AlojamientoModel();
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

            $alojamiento = new AlojamientoModel();
            $resultado = $alojamiento->add_favorito($id_usuario, $id_alojamiento);

            if ($resultado) {
                header('Location: /Alojamientos_app_PHP/Alojamiento/add_favorito/');
            } else {
                echo "Hubo un error para agregar este alojamiento a favoritos";
            }
        }
    }

    public function delete_favorito() {}
}
