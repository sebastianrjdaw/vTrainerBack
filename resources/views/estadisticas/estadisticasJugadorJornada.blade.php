@extends('app')

@section('contenido')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jugadores de la Jornada-{{$numeroJornada}} </h1>

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
                            <th>Dorsal<th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadoresConEstadisticas as $jugador )
                        <tr>
                            
                            <td>{{ $jugador['nombre']}}</td>
                            <td>{{ $jugador['posicion'] }}</td>
                            <td>{{ $jugador['dorsal'] }}</td>
                            <td><a href="/estadisticaJugador/{{$jugador['id']}}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection