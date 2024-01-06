@extends('app')

@section('contenido')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <p class="mb-4">En esta pagina podras ver todos los Usuarios Registrados </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="users" class="table table-bordered table-striped" id="dataTable" width="100%"
                        cellspacing="0">
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
                                        <a href="{{ route('users.edit', $usuario) }}" class="btn btn-primary btn-sm">
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
