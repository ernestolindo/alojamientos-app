<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");
    </style>
</head>

<body style="background-color: #151515; color: #cccccc; font-family: 'Open Sans', serif">
    <h1>Login</h1>
    <form action="process" method="POST">

        <label for="correo">Correo</label>
        <input type="email" id="correo" name="correo" required>

        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" required>

        <button type="submit">Iniciar sesión</button>

    </form>
    <script></script>

    <?php require "app/views/partials/footer.php"; ?> <!-- FOOTER -->
</body>


</html>