@extends('app')

@section('contenido')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Editar Usuario</h3>
        <div class="card shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Información del Usuario</p>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name"><strong>Nombre</strong></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" value="{{ $usuario->name }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email"><strong>Email</strong></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" id="email" value="{{ $usuario->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Opcional: Campo para cambiar la contraseña -->
                        <div class="col">
                            <div class="form-group">
                                <label for="password"><strong>Nueva Contraseña</strong></label>
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Dejar en blanco para no cambiar">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="rol"><strong>Rol</strong></label>
                                <select class="form-control" name="rol" id="rol">
                                    <option value="Admin" {{ $usuario->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Usuario" {{ $usuario->rol == 'usuario' ? 'selected' : '' }}>Usuario
                                    </option>
                                    <!-- Otras opciones de rol aquí -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Actualizar Usuario</button>
                    </div>
                </form>
            </div>
            <button class="btn ml-auto btn-secondary btn-sm" onclick="history.back();">Volver</button>
        </div>
    </div>
@endsection
