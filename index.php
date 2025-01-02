<?php

// Ruta solicitada (e.g., /usuario/login)
$request = $_GET['url'] ?? '';

// Procesar la ruta
if ($request) {
    $segments = explode('/', $request);
    $controller = $segments[0] ?? 'home';
    $action = $segments[1] ?? 'index';

    $controllerFile = "app/controllers/" . ucfirst($controller) . "Controller.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        $className = ucfirst($controller) . "Controller";
        $controllerObject = new $className();

        if (method_exists($controllerObject, $action)) {
            $controllerObject->$action();
        } else {
            echo "Acción no encontrada.";
        }
    } else {
        echo "Controlador no encontrado.";
    }
} else {
    header('Location: home/index/');
    exit();
}
