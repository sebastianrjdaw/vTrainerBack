@extends('app')

@section('contenido')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jornadas </h1>
    <p class="mb-4">En esta pagina podras ver el registro de tus encuentros </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabla de Jornadas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Rival</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jornadas as $jornada )
                        <tr>
                            <td>{{$jornada->fecha}}</td>
                            <td>{{$jornada->rival}}</td>
                            <td><a href="{{ route('jornada.show',[$jornada->id]) }}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection