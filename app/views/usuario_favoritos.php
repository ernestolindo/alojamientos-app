<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos Favoritos</title>
</head>

<body style="font-family: 'Open Sans', serif">

    <?php require "app/views/partials/navbar.php"; ?> <!-- NAVBAR -->

    <main class="container" style="margin-top: 150px;">
        <p class="text-center fs-2"><strong>Favoritos</strong></p>

        <?php if (!empty($favoritos)): ?>
            <div class="row">
                <?php foreach ($favoritos as $alojamiento): ?>
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <div class="row g-0">
                                <!-- Imagen del alojamiento -->
                                <div class="col-md-6 col-lg-4">
                                    <?php if ($alojamiento['imagen']): ?>
                                        <img src="<?= htmlspecialchars($alojamiento['imagen']) ?>" class="img-fluid rounded-start" alt="Imagen de <?= htmlspecialchars($alojamiento['nombre']) ?>">
                                    <?php else: ?>
                                        <img src="default.jpg" class="img-fluid rounded-start" alt="Imagen predeterminada">
                                    <?php endif; ?>
                                </div>

                                <!-- Información del alojamiento -->
                                <div class="col-md-6 col-lg-8">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-capitalize"><strong><?= htmlspecialchars($alojamiento['nombre']) ?></strong></h5>
                                        <p class="card-text">
                                            <?= htmlspecialchars($alojamiento['descripcion']) ?>
                                        </p>
                                        <p>
                                        <p class="text-capitalize"><strong>dirección:</strong> <?= htmlspecialchars($alojamiento['direccion']) ?></p>
                                        <p class="text-capitalize"><strong>precio: </strong>$<?= htmlspecialchars(number_format($alojamiento['precio'], 2)) ?></p>
                                        <p class="text-capitalize"><strong>capacidad: </strong><?= htmlspecialchars($alojamiento['minpersona']) ?> - <?= htmlspecialchars($alojamiento['maxpersona']) ?> personas</p>
                                        <p class="text-capitalize"><strong>departamento y/o ciudad: </strong><?= htmlspecialchars($alojamiento['departamento']) ?></p>
                                        </p>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteFav-<?= $alojamiento['id'] ?>">Eliminar favorito</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de eliminación único para cada alojamiento -->
                    <div class="modal fade" id="modalDeleteFav-<?= $alojamiento['id'] ?>" aria-hidden="true" aria-labelledby="LabelDeleteFav-<?= $alojamiento['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="LabelDeleteFav-<?= $alojamiento['id'] ?>">Eliminar favorito</h1>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este alojamiento como favorito?
                                </div>
                                <div class="modal-footer">
                                    <form action="/Alojamientos_app_PHP/Useralojamiento/delete_favorito/" method="POST">

                                        <!-- id_alojamiento-->
                                        <input type="hidden" name="id_alojamiento" value="<?= htmlspecialchars($alojamiento['id']) ?>">

                                        <!-- id_usuario -->
                                        <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($_SESSION['usuario_id']) ?>">

                                        <!-- Botones -->
                                        <button type="submit" class="btn btn-success">Confirmar</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                No tienes alojamientos en tu lista de favoritos.
            </div>
        <?php endif; ?>
    </main>


    <?php require "app/views/partials/footer.php"; ?> <!-- FOOTER -->

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>