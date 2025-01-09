<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Estilos google fonts-->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");
    </style>

    <style>
        /*MAIN-NAVBAR*/
        .navbars {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 10;
        }

        .main-navbar ul li {
            transition: 0.3s ease;
            color: #000;
        }

        .main-navbar ul li:hover {
            background-color: rgba(227, 228, 223, 0.562) !important;
            transition: 0.3s ease;
            border-radius: 20px;
        }

        /*SEC-NAVBAR*/
        .sec-navbar .navbar-nav .nav-item a {
            transition: 0.3s ease;
            color: #fff;
        }

        .sec-navbar .navbar-nav .nav-item a:hover {
            background-color: rgba(227, 228, 223, 0.37) !important;
            transition: 0.3s ease;
            color: #fff !important;
            border-radius: 20px;
        }

        @media(max-width: 600px) {

            .logo-title a,
            .main-navbar ul li,
            .main-navbar button,
            .sec-navbar .navbar-nav li a {
                font-size: 0.9em !important;
            }
        }
    </style>
</head>

<body>
    <div class="navbars">

        <!-- NAVBAR PRINCIPAL -->
        <nav class="main-navbar navbar navbar-expand bg-white p-3">
            <div class="container-fluid justify-content-between">

                <div class="logo-title d-flex justify-content-center align-items-center gap-2">
                    <i class="fa-solid fa-hotel fs-4" style="color:orange;"></i>
                    <a class="navbar-brand" href="/Alojamientos_app_PHP/home/index/">Alojamientos</a>
                </div>

                <!--LISTA NAV-->
                <ul class="navbar-nav">
                    <li>
                        <!--DROPDOWN USER-->
                        <div class="btn-group dropstart">

                            <button class="btn dropdown-toggle border rounded-pill d-flex justify-content-center align-items-center gap-2 p-2 px-3 text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo (!isset($_SESSION['usuario_id'])) ? '<i class="fa-solid fa-user fs-5"></i>' : '<i class="fa-solid fa-user"></i>' . $_SESSION['nombre'] ?>
                            </button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/Alojamientos_app_PHP/auth/register/">Registrate</a></li>
                                <li><a class="dropdown-item" href="/Alojamientos_app_PHP/auth/login/">Iniciar Sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- NAVBAR SECUNDARIO -->
        <nav class="sec-navbar navbar navbar-expand bg-dark p-1">
            <div class="container-fluid justify-content-between">

                <!--Boton que aparecera al ADMIN o al USUARIO segun la persona logueada-->
                <?php if (!isset($_SESSION['usuario_id'])) {
                    echo "<div></div>"; //Si aun no hay sesion iniciada, no se muestra el dropdown
                } else { ?>
                    <div class="dropdown">
                        <a class="btn dropdown-toggle text-white d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center justify-content-center gap-2">

                                <?php if ($_SESSION['tipo'] === "admin") { ?>
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    <p class="m-0 d-none d-sm-block">Admin</p>;
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-black" href="/Alojamientos_app_PHP/Alojamiento/create/">+ Añadir alojamiento</a></li>
                                    </ul>

                                <?php } else { ?>
                                    <i class="fa-solid fa-bars"></i>
                                    <p class="m-0 d-none d-sm-block">Opciones</p>;
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-black" href="#">Ver favoritos</a></li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                <?php } ?>

                <!--LISTA NAV-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link px-2 px-sm-4 text-white" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 px-sm-4 text-white" href="#">Reservación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 px-sm-4 text-white" href="#">Ofertas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>