<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Alojamiento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>

<body style="font-family: 'Open Sans', serif">

    <?php require "app/views/partials/navbar.php"; ?> <!-- NAVBAR -->

    <main class="container" style="margin-top: 150px;">
        <div class="row align-items-center">
            <!-- imagen -->
            <div class="col-lg-4 text-center mb-3">
                <img src="<?= htmlspecialchars($alojamiento['imagen']); ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($alojamiento['nombre']); ?>" style="height: 300px; object-fit: cover;">
            </div>

            <!-- detalles -->
            <div class="col-lg-8 d-flex flex-column justify-content-center">
                <div class="card-body text-center text-lg-start">
                    <strong class="card-title fs-4 text-capitalize"><?= htmlspecialchars($alojamiento['nombre']); ?></strong>
                    <p class="card-text mt-3"><strong>Descripción:</strong> <?= htmlspecialchars($alojamiento['descripcion']); ?></p>
                    <p class="card-text text-capitalize"><strong>Dirección:</strong> <?= htmlspecialchars($alojamiento['direccion']); ?></p>
                    <p class="card-text"><strong>Precio por noche:</strong> $<?= htmlspecialchars($alojamiento['precio']); ?></p>
                    <p class="card-text text-capitalize"><strong>Departamento y/o ciudad:</strong> <?= htmlspecialchars($alojamiento['departamento']); ?></p>
                    <p class="card-text"><strong>Capacidad:</strong> De <?= htmlspecialchars($alojamiento['minpersona']); ?> a <?= htmlspecialchars($alojamiento['maxpersona']); ?> personas.</p>
                </div>
            </div>
        </div>

        <!-- Boton de vuelta a inicio -->
        <div class="row my-4">
            <div class="col text-center">
                <a href="/Alojamientos_app_PHP/home/index/" class="btn btn-light text-white" style="background-color: #ebaf41 !important;">Volver al inicio</a>
            </div>
        </div>
    </main>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>