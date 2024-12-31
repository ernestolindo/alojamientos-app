<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alojamientos App</title>

    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- home.css-->
    <link href="../../public/css/home.css" rel="stylesheet">

    <!-- Estilos google fonts-->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");  
    </style>
</head>

<body style="background-color: #434C5E; color: #D8DEE9; font-family: 'Open Sans', serif">

    <main class="central-container d-flex flex-column justify-content-center align-items-center">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand bg-transparent p-0">
            <div class="container-fluid justify-content-center justify-content-sm-end ">
                <ul class="navbar-nav d-flex flex-row gap-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Reserva Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white">Ofertas</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--SECTION de contenido-->
        <section class="container d-flex flex-column">
            <div>
                <p class="title-text text-white text-center">Encuentra el descanso que mereces</p>
                <p class="subtitle-text text-white text-center">Escoge entre alojamientos en lugares únicos, ideales
                    para desconectar del día a día.</p>
            </div>
            <div class="line-separator my-4">.</div>
            <div class="text-center">
                <button class="btn btn-dark border" type="button">Ver alojamientos</button>
            </div>
        </section>
    </main>



    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>


