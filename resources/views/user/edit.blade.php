@extends('layout.layout')

@section('content')
    <div class="container-fluid" style="padding: 60px">
        <form action="{{ route('user.update', $data->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Username:</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $data->username }}">
                </div>

                <div class="mb-3">
                    <label>Email:</label>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" name="email" value="{{ $data->email }}">
                </div>

                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                </div>

                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Permission</label>
                    <select class="form-select" id="inputGroupSelect01" name="permission_id">
                        <option selected>Chọn quyền</option>
                        @foreach($permissions as $permission)
                            <option
                                @if($permissionOfUser->id == $permission->id)
                                    selected
                                @endif
                                value="{{ $permission->id }}"
                            >{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style=" display: block; margin-left: auto; margin-right: auto">Cập Nhật</button>
        </form>
    </div>
@endsection
