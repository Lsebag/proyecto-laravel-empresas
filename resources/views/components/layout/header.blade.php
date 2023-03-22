<div class="h-15vh bg-header flex flex-row">
    <img src="{{asset('img/logo-php.png')}}" alt="logo-empresa" class="h-15vh">
<div class="text-6xl text-white flex-auto m-auto">

    <h1>Gestión de empresas</h1>
</div>

<div class="flex-end m-auto">
    <form action="login" method="post">
{{--        <x-text-input name="email" class="bg-red-200"/>--}}
        <div>
            <x-text-input class="mx-3 bg-red-100 w-1/4" name="email" type="email" placeholder="email" />
            <x-text-input class="mx-3 bg-red-100 w-1/4" name="password" type="password" placeholder="password" />
        </div>

        <div>
{{--        <input type="email" name="email" id="email" placeholder="email" class="text-xd w-2/12 h-1/16">--}}
{{--        <input type="password" name="password" id="password" placeholder="password">--}}

            <x-primary-button>Login</x-primary-button>
            <x-anchor-register href="{{route('register')}}">Registrarse</x-anchor-register>

{{--            <button type="submit" value="login">Login</button>--}}
{{--            <button type="submit" value="register">Register</button>--}}
        </div>
    </form>
{{--    Con la líinea de abajo pinto lo que tengo almacenado en $slot--}}
{{--    <h2 class="text-2xl">{{$slot}}</h2>--}}
</div>
</div>
