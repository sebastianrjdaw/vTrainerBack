@extends('app')

@section('contenido')
    <div class="container-fluid">
        <!-- Mensaje de éxito al borrar un mensaje -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Encabezado de la Página -->
        <p class="mb-4">Aquí puedes ver todos los mensajes recibidos.</p>

        <!-- Tabla de Mensajes -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mensajes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Mensaje</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mensajes as $mensaje)
                                <tr>
                                    <td>
                                        <a href="{{ route('mensajes.show', $mensaje->id) }}">
                                            {{ $mensaje->tipo }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('mensajes.show', $mensaje->id) }}">
                                            {{ Str::limit($mensaje->mensaje, 30) }}
                                        </a>
                                    </td>
                                    <td>{{ $mensaje->estado === 0 ? 'No leído' : 'Leído' }}</td>
                                    <td>
                                        <!-- Botón Eliminar -->
                                        <form action="{{ route('mensajes.destroy', $mensaje->id) }}" method="POST"
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
