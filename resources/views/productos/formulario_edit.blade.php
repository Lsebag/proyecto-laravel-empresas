@extends("layout");
@section("main")
    <fieldset class="m-20 p-5 bg-amber-100">
        <legend>Datos nuevo producto</legend>
        <form action="{{route('products.update',$producto->cod)}}" method="post">
            @csrf
            @method('PUT')
            Cod <input type="text" name="cod" value="{{$producto->cod}}" id=""><br>
            Nombre <input type="text" name="nombre" value="{{$producto->nombre}}" id=""><br>
            Nombre corto <input type="text" name="nombre_corto" value="{{$producto->nombre_corto}}" id=""><br>
            Descripcion <textarea name="descripcion">{{$producto->descripcion}}</textarea><br>
            Precio <input type="text" name="PVP" id="" value="{{$producto->PVP}}"><br>
            Familia <input type="text" name="familia" id="" value="{{$producto->familia}}"><br>
            <x-primary-button>Guardar</x-primary-button>

        </form>
    </fieldset>
@endsection
