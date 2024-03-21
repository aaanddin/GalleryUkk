@extends('layout.app')

@section('content')
<style>
  .row .col-2 .card#photo:hover{
      transform: scale(1.02);
  }

  .row .col-2 .card#photo, .row .col{
      cursor: pointer;
      transition: all 0.3s;
      width: 220px;
      height: 300px;
  }
  .row .col-2 .card#photo .card-body{
      background-color: whitesmoke;
      color: white;
  }

  .card#photo img{
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
  border-radius: 15px 15px 0px 0px;
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
  color: #394867;
  font-size: 1em;
  background-color: lightgray;
  padding: 6px 23px 9px;
  border-radius: 10px;
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
.messageBox {
  width: 100%;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #394867;
  padding: 0 15px;
  border-radius: 0 0 10px 10px;
  border: 1px solid rgb(63, 63, 63);
}
.messageBox:focus-within {
  border: 1px solid rgb(110, 110, 110);
}
.tooltip {
  position: absolute;
  top: -40px;
  display: none;
  opacity: 0;
  color: white;
  font-size: 10px;
  text-wrap: nowrap;
  background-color: #000;
  padding: 6px 10px;
  border: 1px solid #3c3c3c;
  border-radius: 5px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.596);
  transition: all 0.3s;
}
#messageInput {
  width: 200px;
  height: 100%;
  background-color: transparent;
  outline: none;
  border: none;
  padding-left: 10px;
  color: white;
}
#messageInput:focus ~ #sendButton svg path,
#messageInput:valid ~ #sendButton svg path {
  fill: #3c3c3c;
  stroke: white;
}

#sendButton {
  width: fit-content;
  height: 100%;
  background-color: transparent;
  outline: none;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s;
}
#sendButton svg {
  height: 18px;
  transition: all 0.3s;
}
#sendButton svg path {
  transition: all 0.3s;
}
#sendButton:hover svg path {
  fill: #3c3c3c;
  stroke: white;
}

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
        <div class="card" id="photo">
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
                    @php
                    $users = App\Models\User::where('id', $foto->FotoID)->get();
                    @endphp
                    @foreach($users as $user)
                    <b><a href="/profil">@auth {{ $user->username }} @endauth</a></b>
                    @endforeach
                    <b><h5 class="card-title" id="modal{{$foto->FotoID}}Label" style="font-weight: bold; ">{{ $foto->JudulFoto }}</h5></b>
                    <p class="card-text">{{ $foto->DeskripsiFoto }}</p>
                    <div class="card" id="komen">
                        <span class="title">Comments</span>
                        <div class="card__tags">
                            <ul class="tag" style="padding-left: 0px;">
                                @php
                                $komentars = App\Models\Komen::where('FotoID', $foto->FotoID)->orderBy('TanggalKomentar','desc')->get();
                                @endphp
                                @foreach ($komentars as $komentar)
                                <li class="tag__name">{{"@".$komentar->user->username." : ".$komentar->IsiKomentar}}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <form action="{{route('komen.store')}}" method="post">
                        <div class="messageBox">
                        @csrf
                            <input type="hidden" value="{{$foto->FotoID}}" id="messageInput" name="FotoID" />
                            <input required="" placeholder="ur comment..." type="text" name="IsiKomentar" id="messageInput" />
                            <button id="sendButton" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 664 663">
                                <path fill="none" d="M646.293 331.888L17.7538 17.6187L155.245 331.888M646.293 331.888L17.753 646.157L155.245 331.888M646.293 331.888L318.735 330.228L155.245 331.888"></path>
                                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="33.67" stroke="#6c6c6c" d="M646.293 331.888L17.7538 17.6187L155.245 331.888M646.293 331.888L17.753 646.157L155.245 331.888M646.293 331.888L318.735 330.228L155.245 331.888"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    @endforeach
</div>
@endsection




