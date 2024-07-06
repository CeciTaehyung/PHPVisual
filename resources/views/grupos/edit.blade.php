@extends ('layouts.app')

@section('content')
<h1>Editar grupo</h1>
<form action="{{route('grupos.update' , $grupo->id }}" method="POST ">
    @crsf
    <div class="row">
    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{{$grupo->nombre }}" require>
    </div>

    <div class="row">
    <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion"
        name="descripcion"> {{ $grupo->descripcion }}</textarea>
        
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn primary">Modificar</button>
        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
</br>
</form>
