<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroom = DB::table('classrooms')->get();
        return view('classroom.index')->with('data', $classroom);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('classrooms')->insert([
           'name' => $request -> name,
           'location' => $request -> location,
        ]);
        return redirect()->route('classroom.index')->with('msg', 'Thêm mới thành công!');
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
        $classroom = DB::table('classrooms')->where('id', $id)->find($id);
        return view('classroom.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('classrooms')->where('id', $id)->update([
            'name' => $request -> name,
            'location' => $request -> location,
        ]);
        return redirect()->route('classroom.index')->with('msg', 'Sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('classrooms')->where('id', $id)->delete();
        return redirect()->route('classroom.index')->with('msg', 'Xóa thành công!');
    }
}
