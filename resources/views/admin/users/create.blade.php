@extends('app')

@section('contenido')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Crear Nuevo Usuario</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Información del Usuario</p>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name"><strong>Nombre</strong></label>
                                <input class="form-control" type="text" placeholder="Nombre" name="name"
                                    id="name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email"><strong>Email</strong></label>
                                <input class="form-control" type="email" placeholder="Email" name="email" id="email"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password"><strong>Contraseña</strong></label>
                                <input class="form-control" type="password" placeholder="Contraseña" name="password"
                                    id="password" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password"><strong>Confirmacion Contraseña</strong></label>
                                <input class="form-control" type="password" placeholder="Contraseña"
                                    name="password_confirmation" id="password" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="rol"><strong>Rol</strong></label>
                                    <select class="form-control" name="rol" id="rol">
                                        <option value="Admin">Admin</option>
                                        <option value="Usuario">Usuario</option>
                                        <!-- Otras opciones de rol aquí -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Crear Usuario</button>
                    </div>
                </form>
            </div>
            <button class="btn ml-auto btn-secondary btn-sm" onclick="history.back();">Volver</button>
        </div>
    </div>
@endsection
