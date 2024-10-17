@extends('layout.layout')

@section('css')
    <style>
        .card {
            width: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
    </style>
@endsection

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
    <div class="container p-5 my-5">
        <div class="row">
            @foreach($attendance as $key => $val)
                <div class="col-md-3 mb-4 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Phiên điểm danh số {{ $val->id }}</h5>
                            <p class="card-text">Lớp học: {{ $val->classes->name }}</p>
                            <p class="card-text">Trạng thái: <span @if($val->status == "Đang Hoạt Động") style="color: mediumspringgreen" @else style="color: blue" @endif >{{ $val->status }}</span></p>
                            <p class="card-text">Môn học: {{ $val->subjects->name }}</p>
                            <p class="card-text">Phòng học: {{ $val->classrooms->name }}</p>
                            <p class="card-text">Tổng số giờ học: {{ $val->subjects->total_hours }}</p>

                            <a href="{{ route('work.showAttendance', $val->id) }}" class="btn btn-success">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

