@extends('layout.layout')
@section('content')
    @if(session('msg'))
        <div class="container">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="container" >
        <img src="{{ asset('/image/welcome2.png') }}" style="width: 100%; height: 100vh; background-size: cover; background-position: center">
    </div>

@endsection

