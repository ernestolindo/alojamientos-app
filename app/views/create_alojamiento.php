<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Añadir alojamiento</title>
</head>

<body style="font-family: 'Open Sans', serif">

    <?php require "app/views/partials/navbar.php"; ?> <!--NAVBAR-->

    <main class="container" style="margin-top: 150px;">
        <h2 class="text-center mb-4">Registrar Alojamiento</h2>

        <form action="./Alojamiento/create" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- Nombre -->
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre del Alojamiento</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del alojamiento" required>
            </div>

            <!-- Descripción -->
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción" required>
            </div>

            <!-- Dirección -->
            <div class="col-12">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección" required>
            </div>

            <!-- Precio -->
            <div class="col-md-4">
                <label for="precio" class="form-label">Precio por noche (USD)</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio" min="1" required>
            </div>

            <!-- Imagen -->
            <div class="col-md-4">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
            </div>

            <!-- Departamento y/o ciudad -->
            <div class="col-md-4">
                <label for="departamento" class="form-label">Departamento y/o ciudad</label>
                <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingrese el departamento y/o ciudad" required>
            </div>

            <!-- Personas mínimas -->
            <div class="col-md-6">
                <label for="minpersona" class="form-label">Personas Mínimas</label>
                <input type="number" class="form-control" id="minpersona" name="minpersona" placeholder="Ingrese el mínimo de personas" min="1" required>
            </div>

            <!-- Personas máximas -->
            <div class="col-md-6">
                <label for="maxpersona" class="form-label">Personas Máximas</label>
                <input type="number" class="form-control" id="maxpersona" name="maxpersona" placeholder="Ingrese el máximo de personas" min="1" required>
            </div>

            <!-- Botón -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-light" style="background-color: #a4ff9d !important;">Confirmar Información</button>
                <button type="button" class="btn btn-ligth" style="background-color: #ffbd64 !important;">Volver a inicio</button>
            </div>
        </form>
    </main>



    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>