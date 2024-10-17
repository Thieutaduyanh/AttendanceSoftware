@extends('layout.layout')
@section('content')
    @if(session('msg'))
        <div class="container">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Thành công! </strong> {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="container" style="margin-top: 10px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Điểm Danh</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('attendance.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                    </div>
                </div>
            </div>
        </div>
        <table id="admin" style="text-align: center">
            <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Lớp Học</th>
                <th style="text-align: center">Môn Học</th>
                <th style="text-align: center">Giảng Viên</th>
                <th style="text-align: center">Ngày Học</th>
                <th style="text-align: center">Phòng Học</th>
                <th style="text-align: center">Trạng Thái</th>
                <th style="text-align: center">Tác Vụ</th>
            </tr>

                @foreach($attendance as $key => $val)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $val->classes->name }}</td>
                    <td>{{ $val->subjects->name}}</td>
                    <td>{{ $val->users->username }}</td>
                    <td>{{ $val->study_day}}</td>
                    <td>{{ $val->classrooms->name }}</td>
                    <td>{{ $val->status }}</td>
                    <td>
                        <a href="{{ route('attendance.edit', $val->id) }}" class="btn btn-success">Sửa</a>
                    </td>
                </tr>
               @endforeach
        </table>
    </div>
@endsection

