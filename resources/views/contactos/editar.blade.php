@extends('layouts/plantilla')


@section('titulo', "Editar Contacto")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-2 w-100">Crud Laravel - Editar</div>
                    <div class="p-2 flex-shrink-1"><a href="{{route('contactos.inicio')}}" class="btn btn-outline-primary btn-sm">Regresar</a></div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Actualizar contacto.</p>
                </blockquote>
                <form action="{{ route('contactos.update', $contacto->idContacto) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="nombre" class="text-black">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ $contacto->nombre }}">
                    <label for="apellido" class="text-black">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required value="{{ $contacto->apellidos }}">
                    <label for="telefono" class="text-black">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required value="{{ $contacto->telefono }}">
                    
                    <label for="email" class="text-black">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $contacto->email }}">
                    <label for="categoria" class="text-black">Categoria</label>
                    <select name=categoria id="categoria" class="form-select" required>
                        <option value="">Selecciona una opción</option>
                        @foreach ($categoria as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                        
                    @auth
                        <input type="text" name="creadoPor" id="creadoPor" value="{{ auth()->user()->id }}" hidden>
                    @endauth
                    <div class="d-grid gap">
                        <button class="btn btn-primary"><span class="fas fa-cubes"></span>Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection