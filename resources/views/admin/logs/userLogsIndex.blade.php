@extends('app')

@section('contenido')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <p class="mb-4">Aquí puedes ver el registro de todas las acciones de los usuarios.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Logs de Usuarios</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Usuario</th>
                                <th>Acción</th>
                                <th>Fecha</th>
                                <th>Nivel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->user_id == 0 ? 'Admin' : $log->user_id }}</td>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $log->importance_level }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
