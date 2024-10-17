@extends('layout.layout')
@section('content')
    @if(session('msg'))
        <div class="alert " style="background-color: lightblue ; color: black">{{ session('msg') }}</div>
    @endif

    <div class="container" style="margin-top: 10px" >
        <div class="card" >
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh Sách Phòng Học</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('classroom.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                    </div>
                </div>
            </div>
        </div>

        <table id="admin" style="text-align: center" class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Phòng Học</th>
                <th style="text-align: center">Vị Trí</th>
                <th style="text-align: center">Tác Vụ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $classroom => $cl)
                <tr>
                    <td>{{ $classroom + 1 }}</td>
                    <td>{{ $cl->name }}</td>
                    <td>{{ $cl->location }}</td>
                    <td>
                        <a href="{{ route('classroom.edit', $cl->id) }}" class="btn btn-success" style="color: white; text-decoration: none;">Sửa</a>
                        <form action="{{ route('classroom.destroy', $cl->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin-left: 10px" onclick="return confirm('Are you sure you want to delete?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection



