@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Propuesta de Entrenamientos</h1>
    <p class="mb-4">En esta pagina podras ver una sugerencia de entrenamientos en base a tus resultados de la ultima jornada</p>

    <!-- DataTales Example -->
    <h3>Entrenamientos de Pista</h3>
    @foreach ($entrenamientosV as $entrenamiento )
    <div class="card shadow  mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$entrenamiento->Titulo}}
            </h6>
        </div>
        <div class="card-body">
            <p>{!! $entrenamiento->Cuerpo !!}</p>
        </div>
    </div>
    @endforeach
    <h3>Entrenamientos de Gimnasio</h3>
    @foreach ($entrenamientosG as $entrenamientoG )
    <div class="card shadow  mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$entrenamientoG->titulo}}
            </h6>
        </div>
        <div class="card-body">
            <p>{!! $entrenamientoG->descripcion !!}</p>
        </div>
    </div>
    @endforeach
</div>


@endsection