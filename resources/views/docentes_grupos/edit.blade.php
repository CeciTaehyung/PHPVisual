@extends('layouts.app')

@section('content')
   <h1>Editar doente grupo</h1>
   <form action="{{ route('docentes_grupos.update' , $docenteGrupo->id) }}" method="POST">
    @csrf
    <div class="col-md-">
        <label for="docente_id" class="form-label">Docente</label>
        <select name="docente_id" class="form-control" required>
            <option value="">seleccione un docente</option>
            @foreach ($docentes as $docente)
            <option value="{{ $docente->id }}" @if($docente->id == $docenteGrupo->docente_id ) selected @endif>
                {{$docente->nombre}} {{$docente->apellido}}
                @endforeach
            </option>
            </select>
    </div> 
    </div>
    <div class="col-md-4">
        <label for="grupo_id" class="form-label">Grupo</label>
        <select name="grupo_id" class="form-control" required>
            <option value="">seleccione un grupo</option>
            @foreach ($grupos as $grupo)
            <option value="{{ $grupo->id }}" @if($grupo->id == $docenteGrupo->grupo) selected @endif>
                {{$grupo->nombre}} {{$grupo->apellido}}
                @endforeach
       </select>
    <br>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn bt-primary">Modificar</button>
            <a href="{{ route('docentes.grupos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
   </form>
@endsection