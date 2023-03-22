<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    @vite(['resources/css/app.css'])
    <title>@yield('titulo')</title>
</head>

<body>
<header class="h-15vh bg-header">
    <h1>cabecera fijo img+titulo+logueo</h1>
</header>
<nav  class="h-10vh bg-nav">
    @yield("menu")
</nav>
<main  class="h-65vh bg-main">
    @yield("main")
</main>
<footer  class="h-10vh bg-footer">
    <h1>footer fijo @copyright contacto y podríamos aportar redes sociales</h1>
</footer>


</body>
</html>
