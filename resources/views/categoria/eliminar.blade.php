@extends('layouts/plantilla')


@section('titulo', "CRUD ** Eliminar")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-2 w-100">Crud Laravel - Eliminar Categoria</div>
                    <div class="p-2 flex-shrink-1"><a href="{{route('categoria.inicio')}}" class="btn btn-outline-primary btn-sm">Regresar</a></div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Borrar Categoria.</p>
                </blockquote>
                <br />
                <div><a href="{{route('logout')}}" class="btn btn-primary btn-sm mt-4 mb-4">Cerrar Session</a></div>
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
                            <table class="table table-dark table-sm" id="t_Categoria">
                                <thead>
                                    <th>nombre</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $categoria->nombre }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST">
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