@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mi Perfil</h1><input type="button" src="#" class="btn btn-md mt-3"><i class="fa-sharp fa-regular fa-gear"></i></button>
    <div class="container container-md">
        <h6>Nombre: {{$perfil->name}} </h6>
        <h6>Fecha Nacimiento: {{$perfil->fechaN}}</h6>
    </div>
</div>
@endsection