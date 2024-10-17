@extends('layout.layout')

@section('content')
    <div class="container pt-5" style="padding: 60px">
        <form action="{{ route('subject.update', $subject->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="subject_code">Mã Môn Học</label>
                        <input class="form-control" type="text" id="subject_code" name="subject_code" placeholder="nhập mã môn học" value="{{ $subject->subject_code }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Tên Môn Học</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="nhập tên môn học" value="{{ $subject->name }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="total_hours">Tổng Số Giờ Học</label>
                        <input class="form-control" type="text" id="total_hours" name="total_hours" placeholder="nhập tổng số giờ học" value="{{ $subject->total_hours }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection


