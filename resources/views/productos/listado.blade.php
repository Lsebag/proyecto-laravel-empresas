@extends('layout')
@section('main')
    <div>
        <x-anchor href="{{route('products.create')}}">Crear producto</x-anchor>
    <table class="w-full text-sm text-left text-gray-700 border">
        <caption>Listado de productos</caption>
        <tr>
            <th class="px-6 py-2">Cod</th>
            <th>Nombre</th>
            <th>Nombre corto</th>
            <th>Precio</th>
            <th>Familia</th>
        </tr>
        @foreach($productos as $producto)
            <tr class="border border-black">
                <td>{{$producto->cod}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->nombre_corto}}</td>
                <td>{{$producto->PVP}}</td>
                <td>{{$producto->familia}}</td>

                <td>
                    <form action="{{route('products.destroy',$producto->cod)}}" method="post">
{{--                        Es lo mismo que decir:--}}
{{--                        <form action="products/{{$producto->cod}}" method="post">--}}

                @method('DELETE')
                        @csrf
                        <x-primary-button>Borrar</x-primary-button>
                    </form>
                </td>

                <td><x-anchor href="{{route('products.edit',$producto->cod)}}">Editar</x-anchor></td>

            </tr>

        @endforeach
    </table>
    </div>
{{--    {{$productos->links()}}--}}
@endsection
