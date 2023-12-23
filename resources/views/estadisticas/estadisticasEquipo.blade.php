@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Estadisticas Equipo</h1>
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Estadisiticas Globales de la Jornada- {{$estadisticaEquipo['numeroJornada']}}
            </h6>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <div class="form-group">
                    <label for="ataque">Ataque</label>
                    <input name="ataque" value="{{$estadisticaEquipo->ataque}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="defensa">Defensa</label>
                    <input name="defensa" value="{{$estadisticaEquipo->defensa}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="recepcion">Recepcion</label>
                    <input name="recepcion" value="{{$estadisticaEquipo->recepcion}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="bloqueo">Bloqueo</label>
                    <input name="bloqueo" value="{{$estadisticaEquipo->bloqueo}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="colocacion">Colocacion</label>
                    <input name="colocacion" value="{{$estadisticaEquipo->colocacion}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="saque">Saque</label>
                    <input name="saque" value="{{$estadisticaEquipo->saque}}" class="form-control" readonly>
                </div>
            </div>




            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Atrás</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection