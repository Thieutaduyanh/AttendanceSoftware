<?php

namespace App\Http\Controllers;


use App\Exports\AttendanceExport;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Attendance;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view('student.student', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view('student.student_insert', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('students')->insert([
           'Code' => $request->code,
           'class_id' => $request -> class_id,
           'Name' => $request->name,
           'Email' => $request->email,
           'Gender' => $request->gender,
           'Phone' => $request->phone,
           'Address' => $request->address
        ]);
        return redirect()->route('student.index')-> with('msg', 'Thêm mới thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $classes = Classes::all();
        return view("student.student_edit", compact('student', 'classes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('students')->where('id', $id)->update([
            'Code' => $request->code,
            'Name' => $request->name,
            'Email' => $request->email,
            'Gender' => $request->gender,
            'Phone' => $request->phone,
            'Address' => $request->address,
            'class_id' => $request->class_id,
        ]);
        return redirect()->route('student.index')->with('msg', 'Đã sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('student.index')->with('msg', 'Xóa sinh viên thành công!');
    }

    public function exportAttendance($attendance_id)
    {
        return Excel::download(new AttendanceExport($attendance_id), 'attendance.xlsx');
    }
}
