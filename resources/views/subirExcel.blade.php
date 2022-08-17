@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container text-center">
      <br><br>
        <div class="row align-items-start">
          <div class="col">
          </div>
          <div class="col">
            <b><p>Suba el archivo PDF con el formato indicado en la siguiente imagen: <br></p></b>
          </div>
          <div class="col">
            <img src="{{asset('imagenes/formatoexcel.PNG')}}" height="auto" width="auto">
          </div>
        </div>
      

        <div class="row align-items-start">
          <div class="col">
          </div>
          <div class="col">
            <form action="{{route('pdf')}}" method="POST" enctype="multipart/form-data" >
              @csrf
              @method('post')
              <br><br>
              <input type="file" name="import_file" required><br>
              <br>
              <button class="btn btn-primary" type="submit" >Subir</button>
              </form>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

</div>

@endsection
