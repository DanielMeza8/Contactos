@extends('layouts/plantilla')


@section('titulo', "CRUD ** HOME")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Crud Laravel - Registro
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Bienvenido.</p>
                </blockquote>

                <form method="POST" action="{{route('validar_registro')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" required>
                    <div id="nombreHelp" class="form-text">Ingresa un nombre de usuario.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Ingresa tu email de registro</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div>
                        <p>¿Tienes una cuenta? <a href="{{url('/')}}">Login</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
@endsection