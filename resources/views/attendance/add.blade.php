@extends('layout.layout')

@section('content')
    <div class="container-fluid" style="padding: 60px">
        <form action="{{ route('attendance.store') }}" method="post">
            @csrf
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Lớp Học</label>
                    <select class="form-select" id="inputGroupSelect01" name="classes_id">
                        <option selected>Chọn lớp</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Môn Học</label>
                    <select class="form-select" id="inputGroupSelect01" name="subject_id">
                        <option selected>Chọn môn học</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Giảng Viên</label>
                    <select class="form-select" id="inputGroupSelect01" name="user_id">
                        <option selected>Chọn giảng viên</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Ngày Học</label>
                    <input type="date" class="form-control" placeholder="nhập ngày học"  aria-describedby="basic-addon1" name="study_day">
                </div>

                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Phòng Học</label>
                    <select class="form-select" id="inputGroupSelect01" name="classroom_id">
                        <option selected>Chọn phòng học</option>
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="" for="inputGroupSelect01">Trạng Thái</label>
                    <select class="form-select" id="inputGroupSelect01" name="status">
                        <option value="">Chọn Trạng Thái</option>
                        <option value="Đang Hoạt Động">Đang Hoạt Động</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style=" display: block; margin-left: auto; margin-right: auto; ">Thêm mới </button>
        </form>
    </div>
@endsection

