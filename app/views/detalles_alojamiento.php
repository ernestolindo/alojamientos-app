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

        <section id="editForm" class="mt-3" style="display: none;">

            <hr>

            <form action="/Alojamientos_app_PHP/Alojamiento/update_crud" method="POST" enctype="multipart/form-data" class="row g-3 mt-3">

                <!-- id -->
                <input type="text" name="id" value="<?= htmlspecialchars($alojamiento['id']); ?>" hidden>

                <!-- Nombre -->
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre del Alojamiento</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($alojamiento['nombre']); ?>" required>
                </div>

                <!-- Descripción -->
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= htmlspecialchars($alojamiento['descripcion']); ?>" required>
                </div>

                <!-- Dirección -->
                <div class="col-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= htmlspecialchars($alojamiento['direccion']); ?>" required>
                </div>

                <!-- Precio -->
                <div class="col-md-4">
                    <label for="precio" class="form-label">Precio por noche (USD)</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($alojamiento['precio']); ?>" min="1" required>
                </div>

                <!-- Departamento y/o ciudad -->
                <div class="col-md-4">
                    <label for="departamento" class="form-label">Departamento y/o ciudad</label>
                    <input type="text" class="form-control" id="departamento" name="departamento" value="<?= htmlspecialchars($alojamiento['departamento']); ?>" required>
                </div>

                <!-- Personas mínimas -->
                <div class="col-6 col-md-2">
                    <label for="minpersona" class="form-label">Min persona</label>
                    <input type="number" class="form-control" id="minpersona" name="minpersona" value="<?= htmlspecialchars($alojamiento['minpersona']); ?>" min="1" required>
                </div>

                <!-- Personas máximas -->
                <div class="col-6 col-md-2">
                    <label for="maxpersona" class="form-label">Max persona</label>
                    <input type="number" class="form-control" id="maxpersona" name="maxpersona" value="<?= htmlspecialchars($alojamiento['maxpersona']); ?>" min="1" required>
                </div>

                <!-- Imagen -->
                <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="checkImage" value="1" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">¿Cambiar imagen?</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        <input type="text" id="imagenValue" name="imgValue" value="1" hidden>
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-12 text-center mb-4">
                    <button type="submit" class="btn btn-light" style="background-color: #a4ff9d !important;">Confirmar Información</button>
                    <a href="/Alojamientos_app_PHP/Alojamiento/getAlojamiento?id=<?= $alojamiento['id']; ?>" class="btn btn-ligth" style="background-color: #ffbd64 !important;">Cancelar</a>
                </div>

                <hr>
            </form>
        </section>

        <!-- Botones -->
        <div class="row mb-4 mx-0 mx-md-5">
            <div class="col text-center mt-3 mt-lg-0 mx-0 mx-md-5">
                <a href="/Alojamientos_app_PHP/home/index/" class="btn btn-dark text-white"><i class="fa-solid fa-backward me-1"></i>Volver al inicio</a>

                <?php if (!isset($_SESSION['tipo'])) { ?>
                    <div class="container mt-3 mb-5 p-4 bg-light rounded shadow-sm">
                        <p class="text-center">Si deseas agregar alojamientos,</p>
                        <a class="btn btn-primary btn-lg d-block text-center mb-3 mx-5 fs-6" href="/Alojamientos_app_PHP/auth/login/">Inicia sesión en tu cuenta</a>
                        <p class="text-center">o si aún no tienes una cuenta,</p>
                        <a class="btn btn-success btn-lg d-block text-center mx-5 fs-6" href="/Alojamientos_app_PHP/auth/register/">¡Regístrate!</a>
                    </div>
                <?php } else { ?>
                    <?php if ($_SESSION['tipo'] === "admin") { ?>
                        <button type="button" id="editButton" class="btn btn-success text-white"><i class="fa-solid fa-pen-to-square me-1"></i>Editar</button>
                        <a href="/Alojamientos_app_PHP/home/index/" class="btn btn-danger text-white" data-bs-target="#modalDelete" data-bs-toggle="modal"> <i class="fa-solid fa-trash me-1"></i>Eliminar</a>
                    <?php } else { ?>
                        <a href="#" class="btn btn-danger text-white"> <i class="fa-solid fa-heart"></i> Agregar a favorito</a>
                <?php }
                } ?>
            </div>
        </div>
    </main>

    <?php require "app/views/partials/footer.php"; ?> <!-- FOOTER -->


    <!--Modal de eliminacion-->
    <div class="modal fade" id="modalDelete" aria-hidden="true" aria-labelledby="LabelDelete" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LabelDelete">Eliminar Alojamiento</h1>
                </div>
                <div class="modal-body">
                    Estas seguro de eliminar este Alojamiento? Sera eliminado definitivamente de la base de datos...
                </div>
                <div class="modal-footer">
                    <form action="/Alojamientos_app_PHP/Alojamiento/delete_crud/" method="POST">

                        <!-- id -->
                        <input type="text" name="idDelete" value="<?= htmlspecialchars($alojamiento['id']); ?>" hidden>

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

    <script>
        //Hace aparecer el form de editar y desaparece el boton
        const editButton = document.getElementById('editButton');
        editButton.addEventListener("click", () => {

            const editForm = document.getElementById('editForm');
            editForm.style.display = "block";
            editButton.style.display = "none";
        });

        //Confirma si la imagen sera cambiada checkeando un checkbox
        const checkImagen = document.querySelector('.form-check-input');
        const inputImagen = document.querySelector('#imagen');
        const imagenValue = document.querySelector('#imagenValue');

        imagenValue.value = 1;

        checkImagen.addEventListener('change', () => {
            if (checkImagen.checked) {
                inputImagen.disabled = false;
                imagenValue.value = 1;
            } else {
                inputImagen.disabled = true;
                imagenValue.value = "<?= htmlspecialchars($alojamiento['imagen']); ?>";
            }
        });
    </script>
</body>

</html>