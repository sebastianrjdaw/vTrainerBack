@extends('app')

@section('contenido')

 <div class="container-fluid">

        <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Entrenamiento: {{$entrenamiento->Titulo}}</h1>
     <div class="container container-md p-3 mt-2">
        {!!($entrenamiento->Cuerpo)!!}
     </div>
     
 </div>

@endsection