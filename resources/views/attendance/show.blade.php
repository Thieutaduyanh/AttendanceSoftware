@extends('layout.layout')
@section('css')
    <style>
        #attendance {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #attendance td, #attendance th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #attendance tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #attendance tr:hover {
            background-color: #ddd;
        }

        #attendance th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: mediumpurple;
            color: white;
        }

        .form-inline label {
            margin-right: 10px;
            font-weight: normal;
        }

        .checkbox-group {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }

        .checkbox-group label {
            font-weight: normal;
        }
        .note-container {
            display: flex;
            align-items: center;
        }

        .note-container label {
            flex-shrink: 0;
            margin-right: 10px;
        }

        .note-container input[type="text"] {
            flex-grow: 1;
            max-width: 300px;
        }
        .highlight {
            background-color: yellow !important;
        }
        .search-container input[type="text"] {
            margin-right: 10px;
            flex-grow: 1;
        }
        .statistics {
            display: flex;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .statistics p {
            font-weight: bold;
            margin: 0 10px;
        }
    </style>
@endsection
@section('content')
    @if(session('msg'))
        <div class="container">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="container" style="margin-top: 25px">
        @if($attendance)
                <?php
                $tong = \App\Models\AttendanceDetail::where('attendance_id', $attendance->id)->get();
                $dihoc = 0;
                $nghihoc = 0;
                $dihocmuon = 0;
                foreach($tong as $index) {
                    if($index->status == "Đi học") {
                        $dihoc += 1;
                    } else if ($index->status == "Nghỉ học") {
                        $nghihoc += 1;
                    } else {
                        $dihocmuon += 1;
                    }
                }
                ?>
            <h3>Chi tiết phiên điểm danh số {{ $attendance->id }}</h3>
            <ul>
                <li>Lớp học: {{ $attendance->classes->name }}</li>
                <li>Môn học: {{ $attendance->subjects->name }}</li>
                <li>Giảng viên: {{ $attendance->users->username }}</li>
                <li>Phòng học: {{ $attendance->classrooms->name }}</li>
                <li>Ngày học: {{ $attendance->study_day }}</li>
            </ul>

            <form action="{{ route('search', $attendance->id) }}" method="post">
                @csrf
                <div class="search-container">
                    <div class="form-group ">
                        <label for="search" style="margin-top: 40px">Tìm kiếm sinh viên: </label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Nhập tên sinh viên">
                    </div>
                    <div class="text-right mt-3" style="margin-bottom: 20px">
                        <button class="btn btn-success" type="submit">Tìm Kiếm</button>
                    </div>
                </div>
            </form>

            <div class="statistics">
                <p>Tổng sinh viên: <span id="total-students" style="color: green">{{ count($students) }}</span></p>
                <p>Đi học: <span id="total_di_hoc" style="color: green">0</span></p>
                <p>Nghỉ học: <span id="total_nghi" style="color: red">0</span></p>
                <p>Đi học muộn: <span id="total_muon" style="color: #ebcc34">0</span></p>
            </div>

            <form action="{{ route('perform', $attendance->id) }}" method="post">
                @csrf
                <table id="attendance">
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Mã Sinh Viên</th>
                        <th style="text-align: center">Họ Tên Sinh Viên</th>
                        <th style="text-align: center">
                            <p>
                                Trạng Thái Điểm Danh
                            </p>
                            <div class="checkbox-group">
                                <label>
                                    <input type="radio" name="selectAllStatus" value="Parent Đi học"> Đi học
                                </label>
                                <label>
                                    <input type="radio" name="selectAllStatus" value="Parent Nghỉ học"> Nghỉ học
                                </label>
                                <label>
                                    <input type="radio" name="selectAllStatus" value="Parent Đi học muộn"> Đi học muộn
                                </label>
                            </div>
                        </th>
                        <th style="text-align: center">Ghi Chú</th>
                    </tr>
                    @foreach($students as $index => $student)
                        <tr id="student-{{ $student->id }}" class="{{ $student->highlight ? 'highlight' : '' }}" tabindex="{{ $student->highlight ? '0' : '-1' }}">
                            <td style="text-align: center"><input type="text" name="student_id[]" value="{{ $index +1 }}" style="border: none; width: 30px; text-align: center;"></td>
                            <td style="text-align: center">{{ $student->Code }}</td>
                            <td style="text-align: center">{{ $student->Name }}</td>
                            <td style="text-align: center">
                                <div class="checkbox-group">
                                    <label>
                                        <input type="radio" class="status" name="status[{{ $index }}]"
                                               value="Đi học">
                                        Đi học
                                    </label>
                                    <label>
                                        <input type="radio" class="status" name="status[{{ $index }}]"
                                               value="Nghỉ học">
                                        Nghỉ học
                                    </label>
                                    <label>
                                        <input type="radio" class="status"   name="status[{{ $index }}]"
                                               value="Đi học muộn">
                                        Đi học muộn
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="note-container">
                                    <label for="note" class="">Nội dung: </label>
                                    <input type="text" id="note" value="" name="note[]" class="form-control ">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="text-right mt-3" style="margin-bottom: 20px">
                    <button class="btn btn-primary" type="submit">Điểm Danh</button>
                </div>
            </form>
        @endif
    </div>
@endsection

@section('js')
{{--    <script>--}}
{{--        let dihocmuonState = [];--}}
{{--        let nghihocState = [];--}}
{{--        let dihocState = [];--}}

{{--        function dihocmuon () {--}}
{{--            const dihocmuonObject = {--}}
{{--                --}}
{{--            }--}}
{{--        }--}}

{{--        function nghihoc () {--}}
{{--            nghihocState++;--}}
{{--        }--}}

{{--        function dihoc() {--}}
{{--            dihocState++;--}}
{{--        }--}}

{{--        function update () {--}}
{{--            const dihoc = document.querySelector('#total_di_hoc');--}}
{{--            const nghihoc = document.querySelector('#total_nghi');--}}
{{--            const dihocmuon = document.querySelector('#total_muon');--}}
{{--            --}}
{{--            dihoc.innerText = dihocState;--}}
{{--            nghihoc.innerText = nghihocState;--}}
{{--            dihocmuon.innerText = dihocmuonState;--}}
{{--        }--}}

{{--        const records = document.querySelectorAll('.record');--}}
{{--        records.forEach(record => {--}}
{{--            const checkBoxGroup =  record.querySelector('.checkbox-group');--}}
{{--            checkBoxGroup.children[0].addEventListener('click',e => {--}}
{{--                dihoc();--}}
{{--                update();--}}
{{--            });--}}

{{--            checkBoxGroup.children[1].addEventListener('click', e => {--}}
{{--                nghihoc();--}}
{{--                update();--}}
{{--            });--}}

{{--            checkBoxGroup.children[2].addEventListener( 'click', e => {--}}
{{--                dihocmuon();--}}
{{--                update();--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateStatistics() {
            // Đếm số lượng các radio button được chọn với giá trị tương ứng
            let totalDiHoc = document.querySelectorAll('input[value="Đi học"]:checked').length;
            let totalNghi = document.querySelectorAll('input[value="Nghỉ học"]:checked').length;
            let totalMuon = document.querySelectorAll('input[value="Đi học muộn"]:checked').length;

            // Cập nật nội dung trong các thẻ span tương ứng
            document.getElementById('total_di_hoc').innerText = totalDiHoc;
            document.getElementById('total_nghi').innerText = totalNghi;
            document.getElementById('total_muon').innerText = totalMuon;
        }

        // Thêm sự kiện 'change' cho tất cả các radio button có class 'status'
        document.querySelectorAll('.status').forEach(function (element) {
            element.addEventListener('change', updateStatistics);
        });

        // Thêm sự kiện 'change' cho các radio button trong phần 'selectAllStatus'
        document.querySelectorAll('input[name="selectAllStatus"]').forEach(function (radio) {
            radio.addEventListener('change', function (event) {
                let selectedStatus = event.target.value;
                // Đánh dấu tất cả các radio button có giá trị tương ứng với trạng thái được chọn
                document.querySelectorAll('.status').forEach(function (statusRadio) {
                    if (('Parent ' + statusRadio.value) === selectedStatus) {
                        statusRadio.checked = true;
                    }
                });
                updateStatistics(); // Cập nhật thống kê sau khi thay đổi trạng thái
            });
        });
        updateStatistics(); // Cập nhật thống kê khi trang web được tải lần đầu
    });
</script>
@endsection

