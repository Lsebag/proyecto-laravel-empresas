@extends('layout')
@section('main')

    <form action="{{route('empresas.store')}}" method="post">
        @csrf
        Nombre <input type="text" name="nombre" value="" id=""><br>
        Direccion <input type="text" name="direccion" value="" id=""><br>
        DNI <input type="text" name="DNI" value="" id=""><br>
        <button type="submit" value="Guardar">Guardar</button>
    </form>

@endsection
