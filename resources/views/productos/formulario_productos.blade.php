@extends("layout");
@section("main")
    <fieldset class="m-20 p-5 bg-amber-100">
        <legend>Datos nuevos productos</legend>
    <form action="{{route("products.store")}}" method="post">
        @csrf
        Cod <input type="text" name="cod" value="{{old('cod')}}" id=""><br>
        Nombre <input type="text" name="nombre" value="{{old('nombre')}}" id=""><br>
        Nombre corto <input type="text" name="nombre_corto" value="{{old('nombre_corto')}}" id=""><br>
        Descripcion <textarea name="descripcion"></textarea><br>
        Precio <input type="text" name="PVP" id="" value="{{old('PVP')}}"><br>
        Familia <input type="text" name="familia" id="" value="{{old('familia')}}"><br>
        <x-primary-button>Guardar</x-primary-button>

    </form>
    </fieldset>
@endsection
