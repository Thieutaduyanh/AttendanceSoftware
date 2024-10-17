<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $permission = DB::table('permissions')->get();
        return view('permission.index')->with('data', $permission);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('permission.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('permissions')->insert([
            'name' => $request->name,
//            name của input
            'description' => $request->description
        ]);
        return redirect()->route('permission.index')->with('msg', 'Thêm mới thành công!');
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
        $permission = DB::table('permissions')->find($id);
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('permissions')->where('id', $id)->update([
            'name' => $request -> name,
            'description' => $request -> description
        ]);
        return redirect()->route('permission.index') ->with('msg', 'Đã sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('permissions')->where('id', $id)->delete();
        return redirect()->route('permission.index')->with('msg', 'Xóa thành công!');
    }
}
