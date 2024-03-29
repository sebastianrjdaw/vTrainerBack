@extends('app')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ver Perfiles</h1>
        <p class="mb-4">En esta pagina podras ver todos los Perfiles Registrados </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabla de Perfiles</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="users" class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->rol }}</td>
                                    <td>
                                        <!-- Botón Editar -->
                                        <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                        <!-- Botón Eliminar -->
                                        <!-- Asegúrate de cambiar 'eliminarUsuarioRuta' por la ruta correcta si es necesario -->
                                        <form action="{{ route('users.destroy', $usuario->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-can"></i>
                                            </button>
                                        </form>
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
