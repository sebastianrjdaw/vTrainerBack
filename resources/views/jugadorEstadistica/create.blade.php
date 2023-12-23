@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Estadisticas Jugador-Jornada</h1>
    <p class="mb-4">
        En este apartado puedes añadir las estadisticas de los jugadores por jornada.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            </h6>
        </div>
        <div class="card-body">
            <form class="container container-md" action="{{ route('jugadorEstadistica.index') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jornadaId" class="form-label">Jornada</label>
                    <select class="form-select" name="jornadaId">
                        @foreach ($jornadas as $jornada )
                        <option value="{{$jornada->id}}">{{$jornada->numero}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jugadorId" class="form-label">Jugador</label>
                    <select class="form-select" name="jugadorId">
                        @foreach ($jugadores as $jugador )
                        <option value="{{$jugador->id}}">{{$jugador->nombre}} / {{$jugador->dorsal}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ataque">Ataque</label>
                    <input name="ataque" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="defensa">Defensa</label>
                    <input name="defensa" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="recepcion">Recepcion</label>
                    <input name="recepcion" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="bloqueo">Bloqueo</label>
                    <input name="bloqueo" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="colocacion">Colocacion</label>
                    <input name="colocacion" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="saque">Saque</label>
                    <input name="saque" type="number" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Subir Estadisticas</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection