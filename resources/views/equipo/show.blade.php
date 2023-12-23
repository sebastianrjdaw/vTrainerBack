@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Info Equipo</h1>
    <p class="mb-4">
         En este apartado puedes ver la informacion de tu Equipo.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{$equipo->nombre}}
            </h6>
        </div>
        
        <div class="card-body">
        <p>Entrenador:  {{$usuario->name}}</p>
        <p>Competicion: {{$equipo->competicion}}</p>
        <p>Ubicacion: {{$equipo->ubicacion}}</p>
        

        <a href="/verjugadores" class="mt-2 btn btn-primary btn-sm">Ver Jugadores</a>
        <a href="/jornada" class="mt-2 btn btn-primary btn-sm">Ver Jornadas</a>
        
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection