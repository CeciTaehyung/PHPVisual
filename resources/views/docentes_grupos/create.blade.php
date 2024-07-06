@extends('loyouts.app')

@section('content')
   <h1>Crear nuevo docente grupo</h1>
   <form action="{{ route('docentes_grupos.store') }}" method="POST">
   @csrf
   <div class="row">
    <div class="col-md-6">
        <label class="docente_id" class="form-label">Docente</label>
        <select name="docente_id" class="form-control" required>
            <option value="">Seleccione un docente</option>
            @foreach($docentes as $docente)
              <option value="{{ $docente->id }}"> {{ $docente->nombre }}  {{ $docente->apellido }}</option>
            @endforeach
        </select>
   </div>
   </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{ route('docentes_grupos.index) }}" class="btn btn-secondary">Cncelar</a>
        </div>
    </div>
   </form>
   @endsection