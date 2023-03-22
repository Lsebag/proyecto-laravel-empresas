@extends('layout')
@section('main')
    <table>
        <caption>Listado de empresas</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
        </tr>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{$empresa->id}}</td>
                <td>{{$empresa->nombre}}</td>
                <td>{{$empresa->direccion}}</td>

            </tr>
        @endforeach
    </table>
@endsection
