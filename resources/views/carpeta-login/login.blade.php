<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicie sesión en proyecto empresas</title>
</head>
<body>

<fieldset>
    <legend>Ingrese sus datos para iniciar sesión</legend>
    <p>https://github.com/MAlejandroR/TiendaLaravel/blob/main/doc/paginas/rf1.md</p>
    <form action=login method="post">
        @csrf
        <label for="email">Ingrese su email</label>
        <input type="text" name="email" id="email"><br>

        <label for="password">Contraseña</label>
        <input type="text" name="password" id="password"><br>

        <button type="submit">Iniciar sesión</button>
    </form>


</fieldset>

</body>
</html>
