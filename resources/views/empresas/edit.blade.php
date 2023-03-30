@extends('layout')
@section('main')

    <form action="{{route('empresas.update',$empresa->id)}}" method="post">
        @method('PUT')
        @csrf
        Nombre <input type="text" name="nombre" value="{{$empresa->nombre}}" id=""><br>
        Direccion <input type="text" name="direccion" value="{{$empresa->direccion}}" id=""><br>
        DNI <input type="text" name="DNI" value="{{$empresa->DNI}}" id=""><br>
        <button type="submit" value="Actualizar">Actualizar</button>
    </form>

@endsection
