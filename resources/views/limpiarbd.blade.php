@extends('layouts.app')

@section('content')


<div class="container">
    <div class="container text-center">
      <br><br>
        <div class="row align-items-start">
          <div class="col">
          </div>
          <div class="col">
            <b><p>De click al siguiente boton si desea limpiar la base de datos: <br></p></b>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row align-items-start">
          <div class="col">
          </div>
          <div class="col">

            <form action="{{route('limpiar')}}" class="formulario-eliminar" method="POST" enctype="multipart/form-data" >
              @csrf
              @method('post')
              
              <button class="btn btn-danger" type="submit">Borrar Datos Actuales </button>
              </form>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

</div>


@endsection



