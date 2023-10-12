@extends('layouts/plantilla')


@section('titulo', "CRUD ** HOME")


@section("contenido") 
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Crud Laravel - Login
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Bienvenido.</p>
                </blockquote>

                <form class="py-4" action="{{route('iniciar')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Ingresa tu email de registro</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div>
                        <p>¿No tienes una cuenta? <a href="{{url('/registro')}}">Registrate</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
                <div class="d-grid gap">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('warning'))
                        <div class="alert alert-warning"> {{ $mensaje }} </div>
                    @elseif ($mensaje = Session::get('danger'))
                        <div class="alert alert-danger"> {{ $mensaje }} </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection