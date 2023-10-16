@extends('layouts/plantilla')


@section('titulo', "CRUD ** HOME")

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-2 w-100">Crud Laravel - Inicio</div>
                    <div class="p-2 flex-shrink-1"><a href="{{route('logout')}}" class="btn btn-outline-primary btn-sm">Cerrar Session</a></div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Bienvenido.</p>
                </blockquote>
                <br>
                <div class="d-grid gap">
                    <a href="{{ route('contactos.create') }}" class="btn btn-success">Agregar nuevo contacto</a>
                    <br />
                    <a href="{{ route('categoria.inicio') }}" class="btn btn-primary">Categorias</a>
                    <br />
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('warning'))
                        <div class="alert alert-warning"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('danger'))
                        <div class="alert alert-danger"> {{ $mensaje }} </div>
                    @endif
                </div>
                <table class="table table-dark table-sm" id="t_Contactos">
                    <thead>
                        <th>nombre</th>
                        <th>email</th>
                        <th>telefono</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($contactos as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telefono }}</td>
                                <td>{{ $item->categoriaContacto }}</td>
                                <td class="text-center"><a href="{{ route('contactos.edit', $item->idContacto) }}" class="btn btn-warning btn-sm">Editar</a></td>
                                <td class="text-center"><a href="{{ route('contactos.show', $item->idContacto) }}" class="btn btn-danger btn-sm">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="width: 500px; height: 500px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    {{-- <script>
        // $(document).ready(function () {
            const gdata = JSON.parse(`<?php echo $data; ?>`);
            // console.log(data);
            const ctx = document.getElementById('myChart');
        
            const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: gdata.label,
                    datasets: [{
                    label:'Cant Amigos categorias',
                    data: gdata.data,
                    borderWidth: 1
                }],
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
            });
        // })
    </script> --}}
@endsection