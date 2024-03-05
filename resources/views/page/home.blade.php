@extends('layout.app')

@section('content')

@if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
@endif
<a href="{{route('page.foto')}}" style="text-decoration: none;"><span style="color: #8785A2; font-weight: bold;">My Photos</span></a><br><br>

@endsection
