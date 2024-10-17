@extends('layout.layout')
@section('content')
    @if(session('msg'))
        <div class="container">
            <div class="alert alert-primary alert-dismissible fade show" role="alert" style="background-color: lightblue">
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
                        <h3>Quản Lý Nhân Viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('user.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                    </div>
                </div>
            </div>
        </div>
        <table id="admin" style="text-align: center">
            <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Username</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Chức Vụ</th>
                <th style="text-align: center">Tác Vụ</th>
            </tr>

            @foreach($data as $key => $val)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $val->username }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->permissions->name }}</td>
                    <td>
                        <a href="{{ route('user.edit', $val->id) }}" class="btn btn-success">Sửa</a>
                        <form action="{{ route('user.destroy', $val->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin-left: 10px" onclick="return confirm('Are you sure you want to delete?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
