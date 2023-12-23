@extends('app')
@section('cuerpo')
<form action="formulario" method="POST">
  @csrf
<div class="mb-3">
@error('nombre')
    <p>{{$mensaje}}<p>
  @enderror
  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Pepe" value="{{ old('nombre') }}">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  @error('email')
    <p>{{$mensaje}}<p>
  @enderror
  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" >
</div>
<div class="mb-3">
@error('asunto')
    <p>{{$mensaje}}<p>
  @enderror
  <label for="exampleFormControlInput1" class="form-label">Asunto</label>
  <input type="text" class="form-control" name='asunto' id="asunto"  placeholder="disputa" value="{{ old('asunto') }}" >
</div>
<div class="mb-3">
@error('mensaje')
    <p>{{$mensaje}}<p>
  @enderror
  <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
  <textarea class="form-control" name='mensaje' id="mensaje" rows="3" value="{{ old('mensaje') }}"></textarea>
</div>
<button type="submit" class="btn btn-primary" >Enviar</button>
</form>
@endsection