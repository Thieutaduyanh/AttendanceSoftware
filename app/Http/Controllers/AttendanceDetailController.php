<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceDetailController extends Controller
{
    private $attendance;
    public function __construct(Attendance $attendance)
    {
        $this->attendance = $attendance;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->permission_id == 1) {
            $attendance = Attendance::all();
        }else {
            $attendance = Attendance::where('user_id', Auth::user()->id)->get();
        }
        return view('work', compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function attendanceUpdate(Request $request, string $id)
    {
        $attendance = $this->attendance->find($id);
        $student_ids = $request->input('student_id');
        $statuses = $request->input('status');
        $notes = $request->input('note');

        $data = [];
        foreach ($student_ids as $index => $student_id) {
            $data[$student_id] = [
                'status' => $statuses[$index],
                'note' => $notes[$index],
            ];
        }

        $attendance->students()->sync($data);

        return back()->with('msg','Sửa điểm danh thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAttendance($id) {
        $attendance = $this->attendance->find($id);
        $students = Student::where('class_id', $attendance->class_id)->get();
        if($attendance->status == "Đang Hoạt Động") {
            return view('attendance.show',compact('attendance', 'students'));
        } else {
            $data = AttendanceDetail::where('attendance_id', $id)->get();
            return view ('attendance.show2', compact('data', 'attendance'));
        }
    }

    public function attendancePerform(Request $request, $id) {
        $attendance = $this->attendance->find($id);
        $attendance->update(['status' => 'Đã Điểm Danh']);
        $student_ids = $request->input('student_id');
        $statuses = $request->input('status');
        $notes = $request->input('note');

        $data = [];
        foreach ($student_ids as $index => $student_id) {
            $data[$student_id] = [
                'status' => $statuses[$index],
                'note' => $notes[$index],
            ];
        }

        $attendance->students()->attach($data); // insert cả 1 mảng vào 1 bảng
        return redirect()->route('work.index')->with('msg', 'Điểm danh thành công!');
    }

    public function search(Request $request, $attendance_id) {
        $attendance = Attendance::find($attendance_id);

        $query = $request->input('search');

        // Lấy toàn bộ sinh viên thuộc lớp học của phiên điểm danh này
        $students = Student::where('class_id', $attendance->class_id)->get();

        // Tìm kiếm sinh viên theo tên
        $searchedStudents = Student::where('name', 'LIKE', "%{$query}%")->get();

        // Highlight các sinh viên được tìm thấy
        foreach ($searchedStudents as $searchedStudent) {
            foreach ($students as $student) {
                if ($student->id == $searchedStudent->id) {
                    $student->highlight = true;
                    break;
                }
            }
        }
        return view('attendance.show', compact('attendance', 'students'));
    }
}
