@extends ('layouts.app')

@section('content')

    
    <div class="row">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{{$docente->nombre }}" disabled>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label for="apellido" class="form-label">apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido"  value="{{$docente->apellido }}" disabled>
    </div>

    <div class="row">
    <div class="col-md-4">
        <label for="email" class="form-label">Correo electronico</label>
        <textarea type="text" class="form-control" id="email" name="email"> {{ $docentes->email }}</textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Retonar</a>
    </div>
</div>
</br>

@endsection