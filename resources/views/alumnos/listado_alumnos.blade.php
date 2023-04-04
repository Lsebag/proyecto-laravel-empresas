@extends('layout')
@section('main')
{{--    <a href="{{route('alumnos.create')}}" >Nueva empresa</a>--}}
    <table>
        <caption>Listado de alumnos</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>

        </tr>
        @foreach($alumnos as $alumno)
            <tr>
                @csrf

                {{--                <td>{{$empresa->id}}</td>--}}
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{$alumno->telefono}}</td>

            </tr>
        @endforeach

    </table>
{{$alumnos->links()}}
@endsection
