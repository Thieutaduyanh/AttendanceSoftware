@extends('layout.layout')

@section('content')
    <div class="container-fluid" style="padding: 60px">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Username:</label>
                    <input type="text" class="form-control" placeholder=" nhập tên người dùng" name="username">
                </div>

                <div class="mb-3">
                    <label>Email:</label>
                    <input type="text" class="form-control" placeholder="nhập email" aria-label="Email" aria-describedby="basic-addon2" name="email">
                </div>

                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" class="form-control" placeholder="nhập mật khẩu" aria-label="Password" aria-describedby="basic-addon1" name="password">
                </div>

                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Phân Quyền</label>
                    <select class="form-select" id="inputGroupSelect01" name="permission_id">
                        <option selected>Chọn quyền</option>
                        @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn btn-primary " style=" display: block; margin-left: auto; margin-right: auto; ">Thêm mới </button>

        </form>


    </div>
@endsection
