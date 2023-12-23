@extends('app')

@section('contenido')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Entrenamientos</h1>
    <p class="mb-4">En esta pagina podras ver todos los entrenamientos guardados tanto los que vienen por defecto como los creados propios <a target="_blank" href="#">Aqui una pagina donde puedes encontrar mas entrenamientos</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabla de Entrenamientos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Etiquetas</th>
                            <th>X</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entrenamientos as $entrenamiento )
                        <tr>
                            <td>{{$entrenamiento->Titulo}}</td>
                            <td>
                                @foreach($entrenamiento->etiquetas as $etiqueta)
                                {{ $etiqueta->Titulo }}
                                @endforeach
                            </td>
                            <td>
                                <div class="container d-flex row gap-2"> 
                                    <form action="{{ route('entrenamientos.show',[$entrenamiento->id]) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary btn-sm">Ver</button>
                                    </form>
                                    <form action="{{ route('entrenamientos.edit',[$entrenamiento->id]) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-info btn-sm">Editar</button>
                                </form>
                                </div>
                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection