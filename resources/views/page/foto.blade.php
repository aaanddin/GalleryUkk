@extends('layout.app')

@section('content')


@if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
@if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

            
  <div class="row justify-content-start">
    @foreach($fotos as $foto)
    <div class="col-2 mb-4">
      <div class="card" id="photo">
        <img src="{{ asset('foto/' . $foto->LokasiFile) }}" class="card-img-top" alt="Foto">
        <div class="card-body">
          <h5 class="card-title text-center fst-italic fw-bold fs-5" style="color: #394867">{{ $foto->JudulFoto }}</h5>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
