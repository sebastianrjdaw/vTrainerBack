@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ajustes de Perfil</h1>
    <div class="container container-md">
        <h6>Nombre: {{$perfil->name}} </h6>
        <h6>Fecha Nacimiento: {{$perfil->fechaN}}</h6>
        <form action="{{ route('perfil.index') }}" method="POST">
            @csrf
            @error('username')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
            <div class="mb-3">
                <label for="username" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="username" id="username" value="{{old('$perfil->name')}}">
            </div>
            <div class="mb-3">
                <label for="fechaN" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fechaN" id="fechaN" value="{{old('$perfil->name')}}">
            </div>
            <div class="mb-3">

            </div>
            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </form>
    </div>
</div>
@endsection