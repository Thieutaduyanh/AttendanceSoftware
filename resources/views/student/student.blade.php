@extends('layout.layout')
@section('content')
    @if(session('msg'))
        <div class="container">
            <div class="alert alert-dismissible fade show" role="alert" style="background-color: lightblue; color: black" >
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="container" style="margin-top: 10px" >
        <div class="card" >
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh Sách Sinh Viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('student.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                    </div>
                </div>
            </div>
        </div>

        <table id="admin" style="text-align: center; font-size: 15px" class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã sinh viên</th>
                <th style="text-align: center">Lớp Học</th>
                <th style="text-align: center">Họ Tên</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Giới tính </th>
                <th style="text-align: center">Địa chỉ </th>
                <th style="text-align: center">Số điện thoại</th>
                <th style="text-align: center ; width: 150px">Tác vụ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student as $sv => $v)
                <tr>
                    <td>{{ $sv + 1 }}</td>
                    <td>{{ $v->Code }}</td>
                    <td>{{ $v->getClass->name }}</td>
                    <td>{{ $v->Name }}</td>
                    <td>{{ $v->Email }}</td>
                    <td>{{ $v->Gender }}</td>
                    <td>{{ $v->Address }}</td>
                    <td>{{ $v->Phone }}</td>
                    <td>
                        <div style="display: flex; justify-content: center; gap: 5px;">
                            <a href="{{ route('student.edit', $v->id) }}" class="btn btn-success" style="color: white; text-decoration: none;">Sửa</a>
                            <form action="{{ route('student.destroy', $v->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 10px" onclick="return confirm('Are you sure you want to delete?')">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
