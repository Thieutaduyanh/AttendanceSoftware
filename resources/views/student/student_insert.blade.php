@extends('layout.layout')

@section('content')
    <div class="container pt-5" style="padding: 60px">
        <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="code">Mã sinh viên</label>
                        <input class="form-control" type="text" id="code" name="code" placeholder="mã sinh viên">
                    </div>

                    <div class="mb-3">
                        <label for="name">Tên sinh viên</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="tên sinh viên">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="email">
                    </div>

                    <div class="mb-3">
                        <label for="gender">Giới tính</label>
                        <select class="form-select" id="gender" name="gender">
                            <option selected>Giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="" for="inputGroupSelect01">Lớp Học</label>
                        <select class="form-select" id="inputGroupSelect01" name="class_id">
                            <option selected>Chọn lớp</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" type="text" id="phone" name="phone" placeholder="số điện thoại">
                    </div>

                    <div class="mb-3">
                        <label for="address">Địa chỉ</label>
                        <textarea class="form-control" placeholder="địa chỉ" id="address" style="height: 120px" cols="6" name="address"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Thêm Sinh Viên</button>
                </div>
            </div>
        </form>
    </div>
@endsection
