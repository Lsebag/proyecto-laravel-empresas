<header class="h-15vh bg-header">
    <div class="flex flex-row">
        <div class="flex-none">
            <img src="{{asset('img/logo-php.png')}}" alt="logo-empresa" class="h-15vh">
        </div>

        <div class="text-6xl text-white flex-auto m-auto text-center">
            <h1>Gestión de empresas</h1>
        </div>

        <div class="flex-end m-auto">
            @auth
                {{auth()->user()->name}}
                <form action="logout" method="post">
                    @csrf
                    <x-primary-button>Logout</x-primary-button>
                </form>
            @endauth

            @guest
                <form action="login" method="post">
                    @csrf
                    {{--        <x-text-input name="email" class="bg-red-200"/>--}}
                    <div class="flex justify-end">
                        <x-text-input class="mx-3 bg-red-100 w-1/4" name="email" type="email" placeholder="email"
                                      value="{{old('email')}}"/>
{{--                        El value="{{old('email')}}" sirve para que se mantenga el valor del campo email--}}
                        <x-text-input class="mx-3 bg-red-100 w-1/4" name="password" type="password" placeholder="password"/>
                    </div>

                    <div class="flex justify-end">
                        {{--        <input type="email" name="email" id="email" placeholder="email" class="text-xd w-2/12 h-1/16">--}}
                        {{--        <input type="password" name="password" id="password" placeholder="password">--}}

                        <x-primary-button class="mx-3 w-1/4 my-2">Login</x-primary-button>
                        <x-anchor class="mx-3 w-1/4 my-2" href="{{route('register')}}">Registrarse
                        </x-anchor>

                        {{--            <button type="submit" value="login">Login</button>--}}
                        {{--            <button type="submit" value="register">Register</button>--}}
                    </div>
                </form>
                {{--    Con la líinea de abajo pinto lo que tengo almacenado en $slot--}}
                {{--    <h2 class="text-2xl">{{$slot}}</h2>--}}
            @endguest
        </div>
    </div>
</header>
