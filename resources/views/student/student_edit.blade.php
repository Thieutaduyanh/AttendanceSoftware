@extends('layout.layout')

@section('content')
    <div class="container pt-5" style="padding: 60px">
        <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="code">Mã sinh viên</label>
                        <input class="form-control" type="text" id="code" name="code" placeholder="mã sinh viên" value="{{ $student->Code }}">
                    </div>

                    <div class="mb-3">
                        <label for="name">Tên sinh viên</label>
                        <input class="form-control" type="text" id="code" name="name" placeholder="tên sinh viên" value="{{ $student->Name }}">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="email" value="{{ $student->Email }}">
                    </div>

                    <div class="mb-3">
                        <label for="gender">Giới tính</label>
                        <select class="form-select" id="gender" name="gender">
                            <option selected>Giới tính</option>
                            @if($student->Gender === 'Nam')
                                <option value="Nam" selected>Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            @elseif($student->Gender === 'Nữ')
                                <option value="Nữ" selected>Nữ</option>
                                <option value="Nam">Nam</option>
                                <option value="Khác">Khác</option>
                            @elseif($student->Gender === 'Khác')
                                <option value="Nữ" >Nữ</option>
                                <option value="Nam">Nam</option>
                                <option value="Khác" selected>Khác</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="" for="inputGroupSelect01">Lớp Học</label>
                        <select class="form-select" id="inputGroupSelect01" name="class_id">
                            <option selected>Chọn lớp học</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}"
                                        @if($class->id == $student->class_id)
                                            selected
                                        @endif
                                >{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" type="text" id="phone" name="phone" placeholder="số điện thoại" value="{{ $student->Phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="address">Địa chỉ</label>
                        <textarea class="form-control" placeholder="địa chỉ" id="address" style="height: 124px" cols="7" name="address" >{{ $student->Address }}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-success float-right">Cập Nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
