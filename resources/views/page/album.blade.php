@extends('layout.app')

@section('content')
@foreach($albums as $album)

<div class="card" style="width: 18rem;">
  <img src="{{ asset('albumcover/' . $album->Cover) }}" class="img-fluid" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$album->NamaAlbum}}</h5>
    <p class="card-text">{{$album->Deskripsi}}</p>
    <a href="/album/detail-album" class="btn" style="background-color: #8785A2; color: white;">Go somewhere</a>
    <form action="{{ route('album.update', $album->AlbumID) }}" method="PUT" class="mt-2">
                      <a href="{{ route('album.edit', $album->AlbumID) }}">
                        <button class="btn" style="background-color: lightgray;">Edit</button>
                      </a>
                    </form>
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="handleDelete({{ $album->AlbumID }})">Delete</button>
                    </form>
  </div>
</div>

@endforeach
@endsection
