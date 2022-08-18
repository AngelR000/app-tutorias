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
        <strong>No se guardaron los registros: </strong> Sucedió un error, revise el formato del archivo que intento subir . 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(Session::get('successB'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Base de Datos eliminada correctamente!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @elseif(Session::get('errorB'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ocurrió un error al intentar eliminar la Base de Datos: </strong> Favor de comunicarse con el Administrador. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <estudiantes-component></estudiantes-component>
</div>

@endsection
