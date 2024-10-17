<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $data = $this->user->all();
        return view('user.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        return view('user.insert')->with('permissions', $permission);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
           'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission_id' => $request->permission_id
        ]);

        return redirect()->route('user.index')->with('msg', 'Thêm mới thành công!');
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
        $data = $this->user->find($id);
        $permissions = Permission::all();
        $permissionOfUser = Permission::find($data->permission_id);

        return view('user.edit', compact('data', 'permissions', 'permissionOfUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            DB::table('users')->where('id', $id)->update([
           'username' => $request->username,
           'email' => $request->email,
           'password' => Hash::make($request->password),
            'permission_id' => $request->permission_id
        ]);
        return redirect()->route('user.index')->with('msg', 'Sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->find($id)->delete();
        return redirect()->route('user.index')->with('msg', 'Xóa thành công!');
    }
}
