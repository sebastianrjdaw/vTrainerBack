@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Estadisticas Jugador</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Nombre: {{$jugador->nombre}} / Posicion: {{$jugador->posicion}}
            </h6>
        </div>
        <div class="card-body">
            @foreach ($estadisticaJugador as $estadistica )
            <div class="container container-md">
                <div class="form-group">
                    <label for="ataque">Ataque</label>
                    <input name="ataque" value="{{$estadistica->ataque}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="defensa">Defensa</label>
                    <input name="defensa" value="{{$estadistica->defensa}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="recepcion">Recepcion</label>
                    <input name="recepcion" value="{{$estadistica->recepcion}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="bloqueo">Bloqueo</label>
                    <input name="bloqueo" value="{{$estadistica->bloqueo}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="colocacion">Colocacion</label>
                    <input name="colocacion" value="{{$estadistica->colocacion}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="saque">Saque</label>
                    <input name="saque" value="{{$estadistica->saque}}" class="form-control" readonly>
                </div>
            </div>
            @endforeach
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Atrás</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection