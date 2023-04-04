@extends('layout')
@section('contenido')

    <x-anchor href="{{route('empresas.create')}}" >Nueva empresa</x-anchor>

    <mitabla filas_serializadas='@json($filas)' campos_serializados='@json($campos)' tabla='{{$tabla}}'>
    </mitabla>

{{--    <table>--}}
{{--        <caption>Listado de empresas</caption>--}}
{{--        <tr>--}}
{{--            <th>ID</th>--}}
{{--            <th>Nombre</th>--}}
{{--            <th>Direccion</th>--}}
{{--            <th>DNI</th>--}}

{{--        </tr>--}}
{{--        @foreach($empresas as $empresa)--}}
{{--            <tr>--}}
{{--                <td>{{$empresa->id}}</td>--}}
{{--                <td>{{$empresa->nombre}}</td>--}}
{{--                <td>{{$empresa->direccion}}</td>--}}
{{--                <td>{{$empresa->DNI}}</td>--}}
{{--                <td><x-anchor href="{{route('empresas.edit',$empresa->id)}}">Editar</x-anchor></td>--}}

{{--                <td>--}}
{{--                    <form action="{{route('empresas.destroy',$empresa->id)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <input type="submit" value="Borrar">--}}
{{--                    </form>--}}
{{--                </td>--}}

{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--    --}}
{{--    Paginación--}}
{{--    {{$empresas->links()}}--}}
@endsection
