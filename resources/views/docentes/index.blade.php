@extends('layouts.app')

@section('content')
   <div class="alert alert-success fade show" id=" success-message" data-bs-dismiss="alert" role="alert">
       {{session('success')}}   
   </div>

@endif

<h1>Lista de docentes</h1>
<from action="{{ route('grupos.index') }}" method="GET">
    @csrf
    <div class="row">
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('grupos.create') }}" class="btn btn-secondary">Ir a crear</a>
        </div>

    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>

        <th>Nombre</th>
        <th>apellido</th>
        <th>email</th>
        <th>acciones</th>
        </tr>
        
    </thead>

    <tbody>
        @foreach ($docentes as $docente)
        <tr>
            <td>{{ $docentes->nombre}}</td>
            <td>{{ $docentes->apellido}}</td>
            <td>{{ $docentes->email}}</td>
            <td>
                <table>
                    <td>
                        <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('docentes.show', $docente->id) }}" class="btn btn-info">Ver</a>
                    </td>
                    <td>
                        <a href="{{route('docentes.delete', $docente->id)}}" class="btn btn-danger">Eliminar</a>
                    </td>
                </table>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="row">
    <div class="col-sm-12">
        {{ $grupo->links() }}

    </div>

</div>
@endsection
