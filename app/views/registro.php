<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>

    <!-- Google Fonts -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap");

        body {
            background-color: #fff;
            color: #cccccc !important;
            font-family: 'Open Sans', sans-serif;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            background-color: #1f1f1f;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            background-color: #2c2c2c !important;
            color: #ffffff !important;
            border: 1px solid #444444 !important;
        }

        .form-control:focus {
            background-color: #2c2c2c;
            color: #ffffff !important;
            border-color: #6666ff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #6666ff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5757d1;
        }

        .register-title {
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .icon {
            color: #6666ff;
        }

        .form-select {
            background-color: #2c2c2c !important;
            color: #ffffff !important;
            border: 1px solid #444444 !important;
        }

        .form-select:focus {
            background-color: #2c2c2c !important;
            color: #ffffff !important;
            border-color: #6666ff;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <?php require "app/views/partials/navbar.php"; ?>

    <div class="register-container mx-2">
        <div class="register-card p-4">
            <h2 class="register-title mb-4">Registro</h2>
            <form action="process" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">
                        <i class="fas fa-envelope icon"></i> Correo
                    </label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        <i class="fas fa-user icon"></i> Nombre
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="contrasenia" class="form-label">
                        <i class="fas fa-lock icon"></i> Contraseña
                    </label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                </div>
                <div class="mb-3">
                </div>
                <div class="text-center">
                    <p>¿Ya tienes una cuenta? <a style="color: #6666ff" href="/Alojamientos_app_PHP/auth/login/">Iniciar Sesión</a></p>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark" style="background-color: #6666ff">Registrarse</button>
                </div>
            </form>
            <div class="dropdown text-center mt-1">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-circle-exclamation text-warning"></i> Info
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><strong>Admin Registrado</strong></a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-envelope"></i> admin@example.com</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-lock"></i> adminpass</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>