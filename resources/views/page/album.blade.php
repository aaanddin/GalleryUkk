@extends('layout.app')

@section('content')
@foreach($albums as $album)

<div class="card" style="width: 18rem;">
  <img src="{{ asset('albumcover/' . $album->Cover) }}" class="img-fluid" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$album->NamaAlbum}}</h5>
    <p class="card-text">{{$album->Deskripsi}}</p>
    <a href="/album/detail-album" class="btn" style="background-color: #8785A2; color: white;">Go somewhere</a>
  </div>
</div>

@endforeach
@endsection
