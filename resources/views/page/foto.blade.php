@extends('layout.app')

@section('content')

<div class="container">
  <div class="card" style="width: 18rem;">
    <img src="{{ asset("img/bluecat.png") }}" class="card-img-top" alt="Foto">
    <div class="card-body">
      <p class="card-text">judul</p>
      <p class="card-text">$f->deskripsi</p>
    </div>
  </div>
</div>
@endsection