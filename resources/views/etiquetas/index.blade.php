@extends('app')

@section('contenido')

<div class="container w-25 border p-4">
    <form action="{{ route('etiquetas.index') }}" method="POST">
        @csrf
        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('titulo')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <div class="mb-3">
            <label for="nombre" class="form-label">Titulo de la Etiqueta</label>
            <input type="text" class="form-control" name="titulo" id="titulo">
        </div>
        <button type="submit" class="btn btn-primary">Crear Etiqueta</button>
    </form>
    @foreach ($etiquetas as $etiqueta )
    <div class="row py-1 mt-3">
        <div class="col-md-9 d-flex align-items-center">
            <h6>{{$etiqueta->Titulo}}</h6>
        </div>
        <div class="col-md-3 d-flex justify-content-end gap-1 ">
            <form action="{{ route('etiquetas.destroy',[$etiqueta->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection