@extends('layout')
@section('contenido')

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>DNI</th>

        </tr>

        <tr>
            <td>
                {{$empresa->id}}
            </td>

            <td>
                {{$empresa->nombre}}
            </td>

            <td>
                {{$empresa->direccion}}
            </td>

            <td>
                {{$empresa->DNI}}
            </td>
        </tr>
    </table>
    <a href="{{route('empresas.index')}}">Volver al listado</a>


    {{-- <form action="{{route('empresas.update',$empresa->id)}}" method="post">
        @method('PUT')
        @csrf
        Nombre <input type="text" name="nombre" value="{{$empresa->nombre}}" id=""><br>
        Direccion <input type="text" name="direccion" value="{{$empresa->direccion}}" id=""><br>
        DNI <input type="text" name="DNI" value="{{$empresa->DNI}}" id=""><br>
        <button type="submit" value="Actualizar">Actualizar</button>
    </form> --}}

@endsection
