@extends('layout.layout')

@section('title', 'Điểm danh ngày ' . $date)

@section('content')
    <div class="container p-5 my-5">
        <h3>Điểm danh ngày {{ $date }}</h3>
        <ul>
            <li>Lớp học: {{ $attendance->classes->name }}</li>
            <li>Môn học: {{ $attendance->subjects->name }}</li>
            <li>Giảng viên: {{ $attendance->users->username }}</li>
            <li>Phòng học: {{ $attendance->classrooms->name }}</li>
            <li>Trạng thái: {{ $attendance->status }}</li>
        </ul>
        @if($attendance->status != 'Đã điểm danh')
            <form action="{{ route('attendance.mark', ['id' => $attendance->id, 'date' => $date]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Điểm danh</button>
            </form>
        @else
            <p>Đã điểm danh</p>
        @endif
    </div>
@endsection
