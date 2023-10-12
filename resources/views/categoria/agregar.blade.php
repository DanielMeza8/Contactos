@extends('layouts/plantilla')


@section('titulo', "Agregar nueva Categoria")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-2 w-100">Crud Laravel - Agregar Categoria</div>
                    <div class="p-2 flex-shrink-1"><a href="{{route('categoria.inicio')}}" class="btn btn-outline-primary btn-sm">Regresar</a></div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Agregar nueva Categoria.</p>
                </blockquote>
                <br />
                <form action="{{ route('categoria.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <label for="nombre" class="text-black">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    <div class="d-grid gap">
                        <button class="btn btn-primary"><span class="fas fa-cubes"></span>Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection