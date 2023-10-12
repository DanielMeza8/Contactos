@extends('layouts/plantilla')


@section('titulo', "CRUD ** HOME")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-2 w-100">Crud Laravel - Inicio Categoria</div>
                    <div class="p-2 flex-shrink-1"><a href="{{route('contactos.inicio')}}" class="btn btn-outline-primary btn-sm">Regresar</a></div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Bienvenido.</p>
                </blockquote>
                <div class="d-grid gap">
                    <a href="{{ route('categoria.create') }}" class="btn btn-success">Agregar nueva Categoria</a>
                    <br />
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('warning'))
                        <div class="alert alert-warning"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('danger'))
                        <div class="alert alert-danger"> {{ $mensaje }} </div>
                    @endif
                </div>
                <table class="table table-dark table-sm" id="t_categoria">
                    <thead>
                        <th>nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($categoria as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td class="text-center"><a href="{{ route('categoria.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a></td>
                                <td class="text-center"><a href="{{ route('categoria.show', $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection