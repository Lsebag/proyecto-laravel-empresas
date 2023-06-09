<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    @vite(["resources/css/app.css"])
    @vite(["resources/js/app.js"])

    <title>@yield('titulo')</title>
</head>

<body>

{{--Las siguientes 3 líneas son las que le dan contenido a $slot--}}
{{--<x-layout.header>--}}
{{--    Hola--}}
{{--</x-layout.header>--}}
    
<x-layout.header />



<nav  class="h-10vh bg-nav">
    <x-anchor href="{{route('empresas.index')}}">EMPRESAS</x-anchor>
{{--    <x-anchor href="{{route('products.index')}}">PRODUCTOS</x-anchor>--}}
    <x-anchor href="{{route('alumnos.index')}}">ALUMNOS</x-anchor>

    <x-anchor href="{{route('idiomas.index')}}">IDIOMAS</x-anchor>

</nav>
@auth

<div id="app">
    @yield('contenido')

</div>

<main  class="h-65vh bg-main">
    @yield("main")
</main>
<footer  class="h-10vh bg-footer">
    <h1>footer fijo @copyright contacto y podríamos aportar redes sociales</h1>
</footer>

@endauth
@guest
 <h2>Inicie sesión para ver el contenido de la página<h2>
@endguest

</body>
</html>
