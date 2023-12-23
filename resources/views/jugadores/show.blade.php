@extends('app')
@section('contenido')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Vista Jugador</h1>
    <p class="mb-4">
        En este apartado puedes ver los datos de jugador.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Jugador
            </h6>
        </div>
        <div class="card-body">

            <div class="form-group">
                <p>Nombre:{{$jugador->nombre}}</p>
            </div>
            <div class="form-group">
                <p>Apellidos:{{$jugador->apellidos}}</p>
            </div>
            <div class="form-group">
                <p>Altura: {{$jugador->altura}} cm</p>
            </div>
            <div class="form-group">
                <p>Dorsal: {{$jugador->dorsal}}</p>
            </div>
            <div class="form-group">
                <p>Posicion:{{$jugador->posicion}}</p>
            </div>
            <form class="container container-md">
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection