@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Crear Equipo</h1>
    <p class="mb-4">
        Aun no tienes un equipo asociado ! En este apartado puedes crear tu Equipo.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Nuevo Equipo
            </h6>
        </div>
        <div class="card-body">
        
        <form class="container container-md" action="{{ route('equipo.index') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Equipo</label>
                    <input type="text" name="nombre" readonly value="{{$usuario->perfil->nombreEquipo}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" name="ubicacion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="competicion">Competicion</label>
                    <select name="competicion" class="form-control">
                        <option value="1º Nacional Masc">1º Nacional Masc</option>
                        <option value="1º Nacional Fem">1º Nacional Fem</option>
                        <option value="2º Nacional Masc">2º Nacional Masc</option>
                        <option value="2º Nacional Fem">2º Nacional Fem</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear Equipo</button>
            <form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection