@extends('app')

@section('contenido')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="container container-lg">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Panel de Administración de vTrainer</h6>
            </div>
            <div class="card-body">
                <p>
                    Bienvenido al panel de administración de vTrainer. Aquí puedes gestionar diferentes aspectos de la aplicación, como usuarios y logs de actividades.
                </p>

                <!-- Funciones disponibles -->
                <p>Funciones disponibles:</p>
                <ul>
                    <li>Visualizar y gestionar registros de usuarios.</li>
                    <li>Revisar logs de creación, eliminación o edición de usuarios.</li>
                </ul>

                <!-- Botones para navegación -->
                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuarios</a>
                    <a href="/user-logs" class="btn btn-primary ">Ver Logs de Usuarios</a>
                    <a href="{{ route('mensajes.index') }}" class="btn btn-primary ">Ver Mensajes Reportados</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


