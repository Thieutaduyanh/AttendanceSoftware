<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = DB::table('subjects')->get();
        return view('subject.index') ->with('data', $subject);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('subjects')->insert([
           'subject_code' => $request -> subject_code,
           'name' => $request -> name,
           'total_hours' => $request -> total_hours,
        ]);
        return redirect()->route('subject.index')->with('msg', 'Thêm môn học thành công!');
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
        $subject = DB::table('subjects')->where('id', $id)->find($id);
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('subjects')->where('id', $id)->update([
           'subject_code' => $request -> subject_code,
           'name' => $request -> name,
           'total_hours' => $request -> total_hours,
        ]);
        return redirect()->route('subject.index')->with('msg', 'Sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect()->route('subject.index')->with('msg', 'Xóa thành công!');
    }
}
