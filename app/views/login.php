<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Google Fonts -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap");

        body {
            background-color: #fff;
            color: #cccccc !important;
            font-family: 'Open Sans', sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #1f1f1f !important;
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
            border: 1px solid #444444;
        }

        .form-control:focus {
            background-color: #2c2c2c !important;
            color: #ffffff;
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

        .login-title {
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .icon {
            color: #6666ff;
        }
    </style>
</head>

<body>

    <?php require "app/views/partials/navbar.php"; ?>

    <div class="login-container mx-2">
        <div class="login-card p-4">
            <h2 class="login-title mb-4">Iniciar Sesión</h2>
            <form action="/Alojamientos_app_PHP/Auth/login" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">
                        <i class="fas fa-envelope icon"></i> Correo
                    </label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="contrasenia" class="form-label">
                        <i class="fas fa-lock icon"></i> Contraseña
                    </label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                </div>
                <div class="text-center">
                    <p>¿No tienes una cuenta? <a style="color: #6666ff" href="/Alojamientos_app_PHP/auth/register/">Registrarse</a></p>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark" style="background-color: #6666ff">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>