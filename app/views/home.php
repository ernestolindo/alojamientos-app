<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alojamientos App</title>

    <!-- home.css-->
    <link href="../../public/css/home.css" rel="stylesheet">
</head>

<body style="font-family: 'Open Sans', serif">

    <?php require "app/views/partials/navbar.php"; ?> <!--NAVBAR-->

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

        <?php include "app/views/partials/card-container-decoration.php"; ?> <!--CONTENEDOR de cards de decoracion-->
        
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

            <!--CARDS desde la DB-->
            <div id="cards-presentation" class="container h-50 d-flex justify-content-between align-items-center gap-2 bg-white p-0 flex-wrap mt-5">

                <?php if (!empty($alojamientos)): ?>
                    <?php foreach ($alojamientos as $alojamiento): ?>
                        <section>

                            <!--Imagen-->
                            <div class="img-card-alojamiento">
                                <a class="text-dark text-decoration-none" href="detalles.php?id=<?= $alojamiento['id']; ?>" target="_blank">
                                    <img class="img-fluid rounded" src="<?= htmlspecialchars($alojamiento['imagen']); ?>" alt="Alojamiento <?= htmlspecialchars($alojamiento['nombre']); ?>" width="350" height="300">
                                </a>
                                <button class="heart-btn text-center mt-5 p-0 bg-transparent border border-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="+Favoritos">
                                    <i class="fa-solid fa-heart fs-3"></i>
                                </button>
                            </div>

                            <div class="d-flex flex-column gap-1 mt-3">

                                <!--Nombre Alojamiento-->
                                <strong class="text-capitalize"><?= htmlspecialchars($alojamiento['nombre']); ?></strong>

                                <!--Numero personas-->
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <i class="fa-solid fa-person text-muted"></i>
                                    <small class="text-muted">3-10 personas</small>
                                </div>

                                <!--Departamento ubicacion-->
                                <small class="text-muted text-capitalize">San Salvador</small>

                                <!--Precio-->
                                <div class="d-flex flex-row gap-1 align-items-center">
                                    <strong>$<?= htmlspecialchars(number_format($alojamiento['precio'], 2)); ?> USD</strong>
                                    <small>Noche</small>
                                </div>

                            </div>
                        </section>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="mt-3 text-center text-muted alert alert-warning">
                        <strong>No hay alojamientos disponibles por el momento.</strong>
                    </p>
                <?php endif; ?>


                <!-- <?php //if (!empty($alojamientos)): 
                        ?>
                    <?php //foreach ($alojamientos as $alojamiento): 
                    ?>
                        <div>
                            <div class="card text-bg-light" style="width: 18rem;">
                                <img src="<? //= htmlspecialchars($alojamiento['imagen']); ?>" class="card-img-top" alt="Imagen del alojamiento">
                                <div class="card-body">
                                    <strong class="card-title fs-6"><? //= htmlspecialchars($alojamiento['nombre']); ?></strong>
                                    <p class="card-text"><? //= htmlspecialchars($alojamiento['descripcion']); ?></p>
                                    <p class="card-text"><strong>Dirección:</strong> <? //= htmlspecialchars($alojamiento['direccion']); ?></p>
                                    <p class="card-text"><strong>Precio:</strong> $<? //= htmlspecialchars($alojamiento['precio']); ?></p>
                                    <a href="detalles.php?id=<? //= $alojamiento['id']; ?>" class="btn btn-light">Ver más</a>
                                </div>
                            </div>
                        </div>
                    <? //php endforeach; 
                    ?>
                <? //php else: 
                ?>
                    <p class="mt-3 text-center text-muted alert alert-warning">
                        <strong>No hay alojamientos disponibles por el momento.</strong>
                    </p>
                <? //php endif; 
                ?> -->

            </div>
        </section>

    </main>



    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!--Nombre Alojamiento-->
    <script src="../../public/js/home.js"></script>

</body>

</html>