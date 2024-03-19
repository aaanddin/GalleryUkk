@extends('layout.app')

@section('content')
<style>
  @foreach($fotos as $foto)
  .row .col-2 .card#photo{{$foto->FotoID}}:hover{
      transform: scale(1.02);
  }

  .row .col-2 .card#photo{{$foto->FotoID}}, .row .col{
      cursor: pointer;
      transition: all 0.3s;
      width: 220px;
      height: 300px;
  }
  .row .col-2 .card#photo{{$foto->FotoID}} .card-body{
      background-color: whitesmoke;
      color: white;
  }

  .card#photo{{$foto->FotoID}} img{
      width: 218px;
      height: 254px;
      margin-bottom: -15px;
      object-fit: cover;
      padding: 15px;
      background-color: whitesmoke;
  }

  .modal .modal-content .card .card-body a{
    color: #394867;
  }

  /* komen */
  .card#komen {
  width: 100%;
  height: 200px;
  background: whitesmoke;
  padding: 10px;
  display: flex;
  flex-wrap: wrap;
  color: #31572c;
  border-radius: 15px;
}
.card__tags {
  overflow: auto;
  height: 75%;
}
.title {
  font-weight: 600;
  font-size: 1rem;
  color: #394867;
}

.tag__name {
  display: inline-block;
  color: #fff;
  font-size: 1.1em;
  background-color: #31572c;
  padding: 6px 23px 9px;
  border-radius: 70em;
  margin: 8px 6px 8px 0;
  margin-left: 0px;
  position: relative;
  text-transform: lowercase;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}


/* .tag__name:hover {
  transform: scale(1.1);
  background-color: #394867;
} */

  @endforeach
</style>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row justify-content-start">
    @foreach($fotos as $foto)
    <div class="col-2 mb-4">
        <div class="card" id="photo{{$foto->FotoID}}">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal{{$foto->FotoID}}">
                <img src="{{ asset('foto/' . $foto->LokasiFile) }}" class="card-img-top" alt="Foto">
            </a>
            <div class="card-body">
                <h5 class="card-title text-center fst-italic fw-bold fs-5" style="color: #394867">{{ $foto->JudulFoto }}</h5>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal{{$foto->FotoID}}" tabindex="-1" aria-labelledby="modal{{$foto->FotoID}}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('foto/' . $foto->LokasiFile) }}" class="img-fluid rounded-start rounded-end" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <b><a href="/profil">@auth {{ auth()->user()->username }} @endauth</a></b>
        <b><h5 class="card-title" id="modal{{$foto->FotoID}}Label" style="font-weight: bold; ">{{ $foto->JudulFoto }}</h5></b>
        <p class="card-text">{{ $foto->DeskripsiFoto }}</p>
        <div class="card" id="komen">
            <span class="title">Comments</span>
            <div class="card__tags">
            <ul class="tag">
                <li class="tag__name">wordpress</li>
                <li class="tag__name">wordpress</li>
                <li class="tag__name">wordpress</li>
                <li class="tag__name">wordpress</li>
                <li class="tag__name">wordpress</li>
                <li class="tag__name">wordpress</li>
            </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
    <div class="card-body" id="komen">
        
      </div>
    </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal{{$foto->FotoID}}" tabindex="-1" aria-labelledby="modal{{$foto->FotoID}}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal{{$foto->FotoID}}Label">{{ $foto->JudulFoto }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('foto/' . $foto->LokasiFile) }}" class="img-fluid" alt="Foto">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
