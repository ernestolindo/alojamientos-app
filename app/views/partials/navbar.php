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
                    <a class="navbar-brand" href="./home.php">Alojamientos</a>
                </div>

                <!--LISTA NAV-->
                <ul class="navbar-nav">
                    <li>
                        <!--DROPDOWN USER-->
                        <div class="dropdown">
                            <button
                                class="btn dropdown-toggle border rounded-pill d-flex justify-content-center align-items-center gap-2 p-2 px-3 text-black"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                                #NombreUser
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../auth/register/">Registrate</a></li>
                                <li><a class="dropdown-item" href="../../auth/login/">Iniciar Sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- NAVBAR SECUNDARIO -->
        <nav class="sec-navbar navbar navbar-expand bg-dark p-1">
            <div class="container-fluid justify-content-center justify-content-sm-between">

                <!--Boton que solo debe aparecer al ADMIN-->
                <div class="dropdown">
                    <a class="btn dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        Admin
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-black" href="#">+ Añadir alojamiento</a></li>
                    </ul>
                </div>

                <!--LISTA NAV-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link px-4 text-white" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 text-white" href="#">Reservación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 text-white" href="#">Ofertas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>