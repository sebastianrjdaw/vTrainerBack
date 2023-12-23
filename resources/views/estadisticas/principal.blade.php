@extends('app')

@section('contenido')



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">

            
            Estadisitica General - {{$equipo->nombre}} - {{$equipo->competicion}}

        </h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Subir Nueva
            Jornada</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                Resultado Ultima Jornada - {{$jornada->fecha}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-4">
                                {{$equipo->nombre}} {{$jornada->resultadoE}} - {{$jornada->resultadoR}} {{$jornada->rival}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Estadisticas Ultima Jornada - Equipo

                    </h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">
                        Ataque <span class="float-right">{{$estadisticaEquipo->ataque*10}}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$estadisticaEquipo->ataque*10}}%" aria-valuenow="{{$estadisticaEquipo->ataque*10}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Defensa <span class="float-right">{{$estadisticaEquipo->defensa*10}}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$estadisticaEquipo->defensa*10}}%" aria-valuenow="{{$estadisticaEquipo->defensa*10}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Recepcion <span class="float-right">{{$estadisticaEquipo->recepcion*10}}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar " role="progressbar" style="background-color:#f0ab18; width: {{$estadisticaEquipo->recepcion*10}}% " aria-valuenow="{{$estadisticaEquipo->recepcion*10}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Bloqueo <span class="float-right">{{$estadisticaEquipo->bloqueo*10}}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar " role="progressbar" style="background-color:#f08418; width: {{$estadisticaEquipo->bloqueo*10}}% " aria-valuenow="{{$estadisticaEquipo->bloqueo*10}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Colocacion <span class="float-right">{{$estadisticaEquipo->colocacion*10}}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary " role="progressbar" style=" width: {{$estadisticaEquipo->colocacion*10}}% " aria-valuenow="{{$estadisticaEquipo->colocacion*10}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Saque <span class="float-right">{{$estadisticaEquipo->saque*10}}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info " role="progressbar" style=" width: {{$estadisticaEquipo->saque*10}}% " aria-valuenow="{{$estadisticaEquipo->saque*10}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Puntos a Mejorar
                    </h6>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($eBajas as $key=>$value )
                        <li>{{$key}}</li>
                        @endforeach
                    </ul>
                    <a href="/rutina" class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm"><i class="fas fa-dumbbell fa-md text-white-50"></i>
                        Propuesta Entrenamiento</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
</div>

@endsection