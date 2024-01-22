@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Encabezado de la Página -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalle del Mensaje</h6>
        </div>

        <div class="card-body">
            <!-- Detalles del Mensaje -->
            @if ($mensaje)
                <div class="mb-3">
                    <h5 class="mb-2">Tipo de Mensaje: {{ $mensaje->tipo }}</h5>
                    <p><strong>Mensaje:</strong></p>
                    <p>{{ $mensaje->mensaje }}</p>
                    <p><strong>Estado:</strong> {{ $mensaje->estado === 0 ? 'No leído' : 'Leído' }}</p>
                    <p><strong>Fecha de Envío:</strong> {{ $mensaje->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <!-- Botones de Acción -->
                <a href="{{ route('mensajes.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                <!-- Aquí puedes añadir más botones si son necesarios -->
            @else
                <p>Mensaje no encontrado.</p>
            @endif
        </div>
    </div>
</div>
@endsection
