@extends('layouts/plantilla')


@section('titulo', "CRUD ** Eliminar")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-2 w-100">Crud Laravel - Eliminar</div>
                    <div class="p-2 flex-shrink-1"><a href="{{route('contactos.inicio')}}" class="btn btn-outline-primary btn-sm">Regresar</a></div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Eliminar Contacto.</p>
                </blockquote>
                <br />
                <div class="d-grid gap">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('warning'))
                        <div class="alert alert-warning"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('danger'))
                        <div class="alert alert-danger"> {{ $mensaje }} </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            ¿Seguro de eliminar el Registro?
                            <p>Una vez eliminado no podr&aacute; ser recuperado</p>
                            <table class="table table-dark table-sm" id="t_Contactos">
                                <thead>
                                    <th>nombre</th>
                                    <th>email</th>
                                    <th>telefono</th>
                                    <th>Categoria</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $contactos->nombre }}</td>
                                        <td>{{ $contactos->email }}</td>
                                        <td>{{ $contactos->telefono }}</td>
                                        <td>{{ $contactos->categoriaContacto }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('contactos.destroy', $contactos->idContacto) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="d-grid gap">
                                    <button class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection