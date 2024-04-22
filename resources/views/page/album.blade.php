@extends('layout.app')

@section('content')
@foreach($albums as $album)

@if(session()->has('delete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('delete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card" style="width: 18rem;">
  <img src="{{ asset('albumcover/' . $album->cover) }}" class="img-fluid" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$album->nama_album}}</h5>
    <p class="card-text">{{$album->deskripsi}}</p>
    <a href="/album/detail-album" class="btn" style="background-color: #8785A2; color: white;">Go somewhere</a>
    <form action="{{ route('album.destroy', $album->id) }}" method="POST" id ="form-delete-{{ $album->id }}" class="mt-3">
                    <a class="btn" style="background-color: lightgray;  width:90px;" href="{{ route('album.edit',$album->id) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" style=" width:90px;" onclick="handleDelete({{ $album->id }})">Delete</button>
                    </form>
  </div>
</div>

@endforeach
@endsection
