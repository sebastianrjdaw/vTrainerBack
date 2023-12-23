@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jornada</h1>

    <div class="container container-md">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estadisticas Jornada{{$jornada->numero}}</h6>
                

            </div>
            <div class="card-body">
            <h6 class="m-0 font-weight-bold text-primary">{{$equipo->nombre}} {{$jornada->resultadoE}} - {{$jornada->resultadoR}} {{$jornada->rival}} </h6>
            <a href="/jugadoresStats/{{ $jornada->id }}" class="mt-4 btn btn-primary" >Estadisticas Jugadores</a>
            <a href="/estadisticasEquipo/{{ $jornada->id }}" class="mt-4 btn btn-primary" >Estadisticas Equipo</a> 
            </div>
        </div>
    </div>
</div>
@endsection