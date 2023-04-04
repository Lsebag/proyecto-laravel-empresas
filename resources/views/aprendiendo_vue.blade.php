
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
{{--    @vite(["resources/js/app.js","resources/css/app.css"])--}}
    @vite(["resources/js/app.js"])
    <title>@yield('titulo')</title>
</head>

<body>

<h2>Zona de Vue</h2>
<div id="app">
    <saludo nombre="Pedro"></saludo>
    <h2> Cronometro</h2>
    <cronometro></cronometro>
</div>

</body>
</html>

