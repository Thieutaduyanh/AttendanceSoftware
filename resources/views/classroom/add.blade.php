@extends('layout.layout')

@section('content')
    <div class="container pt-5" style="padding: 60px">
        <form action="{{ route('classroom.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{--            phương thức bảo mật--}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Phòng Học</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="nhập tên phòng học">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location">Vị Trí</label>
                        <input class="form-control" type="text" id="location" name="location" placeholder="nhập vị trí phòng học">
                    </div>
                </div>

                <div class="col-md-12" >
                    <button type="submit" class="btn btn-primary " style="margin-top: 20px">Thêm Phòng Học</button>
                </div>
            </div>
        </form>
    </div>
@endsection



