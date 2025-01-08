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
            </form>
        </section>

        <!-- Botones -->
        <div class="row mb-4">
            <div class="col text-center mt-3 mt-lg-0">
                <a href="/Alojamientos_app_PHP/home/index/" class="btn btn-danger text-white">Volver al inicio</a>
                <button type="button" id="editButton" class="btn btn-success text-white">Editar</button>
            </div>
        </div>
    </main>

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