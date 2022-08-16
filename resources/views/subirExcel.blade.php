@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container text-center">
        <div class="row align-items-start">
          <div class="col">
          </div>
          <div class="col">
            <form action="{{route('pdf')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('post');
            <input type="file" name="import_file" required>
            <button class="btn btn-primary" type="submit">Subir</button>
            </form>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

</div>

@endsection
