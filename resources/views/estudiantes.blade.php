@extends('layouts.app2')

@section('content2')
<div class="container">
    @if(Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Registros Guardados Exitosamente!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @elseif(Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>No se guardaron los registros: </strong> Sucedio un error, revise el formato del archivo que intento subir . 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <estudiantes-component></estudiantes-component>
</div>

@endsection
