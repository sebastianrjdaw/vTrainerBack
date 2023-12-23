@extends('app')

@section('contenido')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ver Jugadores - Admin</h1>
    <p class="mb-4">En esta pagina podras ver todos los jugadores del Gestor </p>

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
                            <td>Nombre Jugador</td>
                            <td>Posicion Jugador</td>
                            <td><a href="#">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection