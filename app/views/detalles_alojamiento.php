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

    <main class="container" style="margin-top: 100px;">
        <h2 class="text-center mb-4">Detalles del Alojamiento</h2>

        <div class="card">
            <img src="<?= htmlspecialchars($alojamiento['imagen']); ?>" class="card-img-top" alt="<?= htmlspecialchars($alojamiento['nombre']); ?>" style="height: 300px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($alojamiento['nombre']); ?></h5>
                <p class="card-text"><strong>Descripción:</strong> <?= htmlspecialchars($alojamiento['descripcion']); ?></p>
                <p class="card-text"><strong>Dirección:</strong> <?= htmlspecialchars($alojamiento['direccion']); ?></p>
                <p class="card-text"><strong>Precio por noche:</strong> $<?= htmlspecialchars($alojamiento['precio']); ?></p>
                <p class="card-text"><strong>Departamento y/o ciudad:</strong> <?= htmlspecialchars($alojamiento['departamento']); ?></p>
                <p class="card-text"><strong>Capacidad:</strong> De <?= htmlspecialchars($alojamiento['minpersona']); ?> a <?= htmlspecialchars($alojamiento['maxpersona']); ?> personas.</p>
                <a href="/Alojamientos_app_PHP/home/index/" class="btn btn-primary">Volver al inicio</a>
            </div>
        </div>
    </main>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>