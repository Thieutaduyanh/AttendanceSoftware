<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Util\SpecReader;

class AttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::all();
        return view('attendance.index', compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        $users = User::all();
        $classrooms = Classroom::all();
        return view('attendance.add', compact('classes', 'subjects', 'users', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        DB::table('attendances')->insert([
            'class_id'=>$request->classes_id,
            'subject_id'=>$request->subject_id,
            'user_id'=>$request->user_id,
            'study_day' => $request->study_day,
            'classroom_id'=>$request->classroom_id,
            'status'=>$request->status,
        ]);
        return redirect()->route('attendance.index')->with('msg', 'Thêm mới thành công!');
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
        $classes = Classes::all();
        $subjects = Subject::all();
        $users = User::all();
        $classrooms = Classroom::all();
        $attendance = Attendance::find($id);
        return view('attendance.edit', compact('attendance','classes', 'subjects', 'users', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('attendances')->where('id', $id)->update([
            'class_id'=>$request->classes_id,
            'subject_id'=>$request->subject_id,
            'user_id'=>$request->user_id,
            'study_day'=>$request->study_day,
            'classroom_id'=>$request->classroom_id,
            'status'=>$request->status,
        ]);
        return redirect()->route('attendance.index')->with('msg', 'Sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
