@extends('app')

@section('contenido')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jugadores de {{$usuario->equipo->nombre}}</h1>
    <p class="mb-4">En esta pagina podras ver todos los jugadores de tu equipo </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabla de Jugadores</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Posicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadores as $jugador )
                        <tr>
                            <td>{{$jugador->nombre}}  {{$jugador->apellidos}}</td>
                            <td>{{$jugador->posicion}}</td>
                            <td><a href="{{ route('jugadores.show',[$jugador->id]) }}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href=" /jugadores.create " class="mt-2 btn btn-primary btn-sm">Añadir Jugadores</a>

            </div>
        </div>
    </div>

</div>


@endsection