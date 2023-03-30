@extends('layout')
@section('main')
    <a href="{{route('empresas.create')}}" >Nueva empresa</a>
    <table>
        <caption>Listado de empresas</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>DNI</th>

        </tr>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{$empresa->id}}</td>
                <td>{{$empresa->nombre}}</td>
                <td>{{$empresa->direccion}}</td>
                <td>{{$empresa->DNI}}</td>
                <td><a href="{{route('empresas.edit',$empresa->id)}}">Editar</a></td>

                <td>
                    <form action="{{route('empresas.destroy',$empresa->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar">
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    {{$empresas->links()}}
@endsection
