@extends('app')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Crear Entrenamiento</h1>

    <div class="container container-md">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear Nuevo entrenamiento</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('entrenamientos.index') }}" method="POST">
                    @csrf
                    @if (session('success'))
                    <h6 class="alert alert-success">{{session('success')}}</h6>
                    @endif
                    @error('titulo')
                    <h6 class="alert alert-danger">{{$message}}</h6>
                    @enderror
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo del Entrenamiento</label>
                        <input type="text" class="form-control" name="titulo" id="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="editor1" class="form-label">Descripción del Entrenamiento</label>
                        <textarea name="editor1"></textarea>
                        <script>
                            CKEDITOR.replace('editor1');
                        </script>
                    </div>
                    <div class="mb-3 ">
                        Etiquetas Disponibles :
                        <div class="form-check mt-2">
                            @foreach ($etiquetas as $etiqueta )
                            <input type="checkbox" value="{{$etiqueta->id}}" name="etiquetas[]" id="etiquetas[]">
                            <label for="etiquetas[]">
                                {{$etiqueta->Titulo}}
                            </label>
                            @endforeach

                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Crear Entrenamiento</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection