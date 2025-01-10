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
        <p>Favoritos</p>

        <?php var_dump($alojamientosFav) ?>

        <?php if (!empty($alojamientosFav)): ?>
            <div class="row">
                <?php foreach ($alojamientosFav as $alojamiento): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <?php if ($alojamiento['imagen']): ?>
                                <img src="<?= htmlspecialchars($alojamiento['imagen']) ?>" class="card-img-top" alt="Imagen de <?= htmlspecialchars($alojamiento['nombre']) ?>">
                            <?php else: ?>
                                <img src="default.jpg" class="card-img-top" alt="Imagen predeterminada">
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($alojamiento['nombre']) ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars($alojamiento['descripcion']) ?>
                                </p>
                                <p>
                                    <strong>Dirección:</strong> <?= htmlspecialchars($alojamiento['direccion']) ?><br>
                                    <strong>Precio:</strong> $<?= htmlspecialchars(number_format($alojamiento['precio'], 2)) ?><br>
                                    <strong>Capacidad:</strong> <?= htmlspecialchars($alojamiento['minpersona']) ?> - <?= htmlspecialchars($alojamiento['maxpersona']) ?> personas<br>
                                    <strong>Departamento:</strong> <?= htmlspecialchars($alojamiento['departamento']) ?>
                                </p>
                                <!--  -->
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


    <!--Modal de eliminacion de favorito-->
    <div class="modal fade" id="modalDeleteFav" aria-hidden="true" aria-labelledby="LabelDeleteFav" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LabelDeleteFav">Eliminar favorito</h1>
                </div>
                <div class="modal-body">
                    Estas seguro de eliminar este Alojamiento como favorito?
                </div>
                <div class="modal-footer">
                    <form action="/Alojamientos_app_PHP/Alojamiento/delete_favorito/" method="POST">

                        <!-- id -->
                        <input type="text" name="idDelete" value="<?= htmlspecialchars($alojamiento['id']); ?>" hidden>

                        <!-- id_usuario -->
                        <input type="text" name="id_usuario" value="<?= $_SESSION['usuario_id']; ?>" hidden>

                        <!-- Botones -->
                        <button type="submit" class="btn btn-success">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>