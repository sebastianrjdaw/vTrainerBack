@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Alta Jugador</h1>
    <p class="mb-4">
        En este apartado puedes añadir jugadores a la plantilla.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Añadir Jugador
            </h6>
        </div>
        <div class="card-body">
            <form class="container container-md" action="{{ route('jugadores.index') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Jugador</label>
                    <input name="nombre" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos Jugador</label>
                    <input name="apellidos" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nombre">Altura</label>
                    <input name="altura" type="number" min="100" max="300" class="form-control" placeholder="cm">
                </div>
                <div class="form-group">
                    <label for="dorsal">Dorsal Jugador</label>
                    <input name="dorsal" type="number" min="1" max="20" class="form-control">
                </div>
                <div class="form-group">
                    <label for="posicion">Posicion Jugador</label>
                    <select name="posicion" class="form-control">
                        <option>Colocador</option>
                        <option>Receptor</option>
                        <option>Central</option>
                        <option>Opuesto</option>
                        <option>Libero</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Alta Jugador</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection