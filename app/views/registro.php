<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");
    </style>
</head>

<body style="background-color: #151515; color: #cccccc; font-family: 'Open Sans', serif">
    <h1>Registro</h1>
    <form action="/register" method="POST">

        <label for="correo">Correo</label>
        <input type="email" id="correo">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre">

        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia">

        <label for="tipo">Tipo de usuario</label>
        <select name="tipo" id="tipo">
            <option value="usuario">Usuario</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Registrarse</button>

    </form>
    <script></script>
</body>

</html>