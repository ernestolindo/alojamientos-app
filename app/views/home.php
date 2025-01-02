<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alojamientos App</title>
</head>

<body style="font-family: 'Open Sans', serif">

    <?php require "./app/views/partials/navbar.php"; ?> <!--NAVBAR-->

    <main>

        <div class="central-container d-flex flex-column justify-content-center align-items-center">

            <!--SECTION de contenido-->
            <section class="container d-flex flex-column">
                <div>
                    <p class="title-text text-white text-center">Encuentra el descanso que mereces</p>
                    <p class="subtitle-text text-white text-center">Escoge entre alojamientos en lugares únicos, ideales
                        para desconectar del día a día.</p>
                </div>
                <div class="line-separator my-4 text-black">.</div>
                <div class="text-center">
                    <button class="btn btn-dark border" type="button" onclick="location.href='#cards-presentation'">Ver
                        alojamientos</button>
                </div>
            </section>
        </div>

        <!--CONTENEDOR de cards-->
        <div id="cards-presentation"
            class="container h-50 d-flex justify-content-center align-items-center gap-2 bg-white p-0">

            <!--Card-->
            <div class="card text-bg-dark d-none d-md-block">
                <img src="../../public/img/img-card-01.avif" class="card-img" alt="img-card">
                <div class="card-img-overlay">
                    <h5 class="card-title">La Costa del Sol</h5>
                    <p class="card-text"><small>Residencia de alojamiento completo</small></p>
                </div>
            </div>

            <!--Card-->
            <div class="card text-bg-dark d-none d-md-block">
                <img src="../../public/img/img-card-02.jpg" class="card-img" alt="img-card">
                <div class="card-img-overlay">
                    <h5 class="card-title">La paz</h5>
                    <p class="card-text"><small>Habitación disponible</small></p>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center my-5">
            <div class="text-white bg-dark" style="height:1px; width:100%;">.</div>
        </div>

        <!--Seccion de alojamientos ingresados-->
        <section class="container my-4">

            <!--Barra de busqueda-->
            <div class="text-center">

                <h1>Explora casas y hoteles, encuentra el lugar ideal</h1>
                <form class="form-buscar d-flex gap-2 mt-4" action="">
                    <input type="search" name="buscarAlojamiento" class="form-control rounded-pill"
                        placeholder="Busca un alojamiento...">

                    <button class="btn btn-light rounded-circle" type="submit" style="background:orange;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

        </section>

    </main>



    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>