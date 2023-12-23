@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jornada</h1>

    <div class="container container-md">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Agregar Nueva Jornada  </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('jornada.index') }}" method="POST">
                    @csrf
                    @error('titulo')
                    <h6 class="alert alert-danger">{{$message}}</h6>
                    @enderror
                    <div class="mb-3">
                        <label for="tipoUsuario" class="form-label">Numero de la Jornada</label>
                        <input type="number" name="numero">
                    </div>
                    <div class="mb-3">
                        <label for="tipoUsuario" class="form-label">Fecha del Encuentro</label>
                        <input type="date" name="fecha">
                    </div>

                    <div class="mb-3">
                        <label for="nombreEquipo" class="form-label"> Nombre del Equipo Rival</label>
                        <input type="text"  name="rival">
                    </div>
                    <div class="mb-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        Resultado
                    <thead>
                        <tr>
                            <th>{{$equipo->nombre}}</th>
                            <th>Rival</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td><input type="number"  name="resultadoE"></td>
                            <td><input type="number"  name="resultadoR"></td>
                        </tr>
                    </tbody>
                </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Jornada</button>
                </form>
                <a href="{{route('jornada.index')}}" class="mt-4 btn btn-primary" >Jornadas Anteriores</a>
            </div>
        </div>
    </div>
</div>
@endsection