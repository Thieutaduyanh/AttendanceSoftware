@extends('layout.layout')

@section('content')
    <div class="container pt-5" style="padding: 60px">
        <form action="{{ route('subject.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{--            phương thức bảo mật--}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="subject_code">Mã Môn Học</label>
                        <input class="form-control" type="text" id="subject_code" name="subject_code" placeholder="nhập mã môn học">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="total_hours">Tên Môn Học</label>
                        <input class="form-control" type="text" id="total_hours" name="total_hours" placeholder="nhập tổng số giờ học">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Tên Môn Học</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="nhập tên môn học">
                    </div>
                </div>

                <div class="col-md-12" >
                    <button type="submit" class="btn btn-primary " style="margin-top: 20px">Thêm Môn Học</button>
                </div>
            </div>
        </form>
    </div>
@endsection




