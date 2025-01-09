<?php
$url_vista = $_SERVER['REQUEST_URI']; //Obtiene la URL de la vista actual
echo ($url_vista !== "/Alojamientos_app_PHP/home/index/") ? session_start()  : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
        <nav class="main-navbar navbar navbar-expand bg-white p-3 border-bottom border-black">
            <div class="container-fluid justify-content-between">

                <div class="logo-title d-flex justify-content-center align-items-center gap-2">
                    <i class="fa-solid fa-hotel fs-4" style="color:orange;"></i>
                    <a class="navbar-brand" href="/Alojamientos_app_PHP/home/index/">Alojamientos</a>
                </div>

                <?php if ($url_vista !== "/Alojamientos_app_PHP/auth/login/" && $url_vista !== "/Alojamientos_app_PHP/auth/register/") { ?>

                    <!--LISTA NAV-->
                    <ul class="navbar-nav">
                        <li>
                            <!--DROPDOWN USER-->
                            <div class="btn-group dropstart">

                                <button class="btn dropdown-toggle border rounded-pill d-flex justify-content-center align-items-center gap-2 p-2 px-3 text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    echo (!isset($_SESSION['usuario_id']))
                                        ? '<i class="fa-solid fa-user fs-5"></i>'
                                        : ($_SESSION['tipo'] === "admin"
                                            ? '<i class="fa-solid fa-user-secret fs-4"></i>' . $_SESSION['nombre'] 
                                            : '<i class="fa-solid fa-user fs-5"></i>' . $_SESSION['nombre']);
                                    ?>
                                </button>

                                <ul class="dropdown-menu">
                                    <?php echo (isset($_SESSION['usuario_id'])) ? '' : '<li><a class="dropdown-item" href="/Alojamientos_app_PHP/auth/login/">Iniciar Sesión</a></li>'; ?>
                                    <?php echo (isset($_SESSION['usuario_id'])) ? '' : '<li><a class="dropdown-item" href="/Alojamientos_app_PHP/auth/register/">Registrate</a></li>'; ?>
                                    <?php echo (!isset($_SESSION['usuario_id'])) ? '' : '<li><a class="dropdown-item" href="/Alojamientos_app_PHP/auth/logout/"><i class="fa-solid fa-right-to-bracket"></i> Cerrar Sesion</a></li>'; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </nav>

        <?php if ($url_vista !== "/Alojamientos_app_PHP/auth/login/" && $url_vista !== "/Alojamientos_app_PHP/auth/register/") { ?>

            <!-- NAVBAR SECUNDARIO -->
            <nav class="sec-navbar navbar navbar-expand bg-dark p-1">
                <div class="container-fluid justify-content-between">

                    <!--Boton que aparecera al ADMIN o al USUARIO segun la persona logueada-->
                    <?php if (!isset($_SESSION['usuario_id'])) { ?>
                        <div></div> <!-- Si no hay sesión, no se muestra nada -->
                    <?php } else { ?>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle text-white d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if ($_SESSION['tipo'] === "admin") { ?>
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    <p class="m-0 d-none d-sm-block">Admin</p>
                                <?php } else { ?>
                                    <i class="fa-solid fa-bars"></i>
                                    <p class="m-0 d-none d-sm-block">Opciones</p>
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($_SESSION['tipo'] === "admin") { ?>
                                    <li><a class="dropdown-item text-black" href="/Alojamientos_app_PHP/Alojamiento/create/">+ Añadir alojamiento</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item text-black" href="/Alojamientos_app_PHP/Alojamiento/add_favorito/">Ver favoritos</a></li>
                                <?php } ?>
                            </ul>
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
        <?php } ?>
    </div>
</body>

</html>