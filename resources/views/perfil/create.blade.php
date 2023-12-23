@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perfil</h1>

    <div class="container container-md">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bienvenido, A tu Perfil  </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('perfil.store') }}" method="POST">
                    @csrf
                    @error('titulo')
                    <h6 class="alert alert-danger">{{$message}}</h6>
                    @enderror
                    <div class="mb-3">
                        <label for="tipoUsuario" class="form-label">Que Tipo de Usuario Eres</label>
                        <select class="form-select" name="tipoUsuario" >
                            <option value="entrenador">Entrenador</option>
                            <option value="jugador">Jugador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombreEquipo" class="form-label">Introduce el Nombre de tu Equipo</label>
                        <input type="text" name="nombreEquipo">
                    </div>
                    <button type="submit" class="btn btn-primary">Configurar Perfil</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection