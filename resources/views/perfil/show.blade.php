@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perfil</h1>

    <div class="container container-md">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
                <h6 class="m-0 font-weight-bold text-primary">Bienvenido, {{$usuario->name}} </h6>
            </div>
            <div class="card-body">
             Estas registrado como <span class="border border-primary p-1 text-uppercase">{{$perfil->tipoUsuario}}</span>   del Equipo: {{$perfil->nombreEquipo}}
            </div>
            <form class="d-flex justify-content-between">
            <button class="btn ml-auto btn-secondary btn-sm">Cambiar Info Perfil</button>
            </form>
        </div>
    </div>
</div>
@endsection