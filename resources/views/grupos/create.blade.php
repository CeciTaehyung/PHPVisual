@extends ('layouts.app')

@section('content')
<form action="{{route('grupos.store') }}" method="POST ">
    @csrf
    <div class="row">
    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" require>
    </div>

    <div class="row">
    <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea type="text" class="form-control" id="nombre" name="nombre"> </textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
</form>
@endsection

