<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = DB::table('classes')->get();
        return view('classes.index')->with('data', $classes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('classes')->insert([
           'name' => $request ->name,
        ]);
        return redirect()->route('classes.index')->with('msg', 'Thêm mới thành công!');
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
        $classes = DB::table('classes')->where('id', $id)->find($id);
        return view('classes.edit', compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('classes')->where('id', $id)->update([
           'name'=> $request -> name,
        ]);
        return redirect()->route('classes.index')->with('msg', 'Sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return redirect()->route('classes.index')->with('msg', 'Xóa thành công!');
    }
}
