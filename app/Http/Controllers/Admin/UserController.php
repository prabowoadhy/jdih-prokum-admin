<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:read user')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        $this->authorize('read user');
        return $dataTable->render('dashboards.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'role' => Role::whereNotIn('name', ['superadmin'])->get()
        ];
        return view('dashboards.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    
        // create new user and save to database
        $user = new User();
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!User::where('id', $id)->first()) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'dashboard/konfigurasi/user/update',
            'user' => User::where('id', $id)->first(),
            'role' => Role::whereNotIn('name', ['superadmin']),
        ];
        return view('dashboards.user.edit', $data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        if (isset(Request()->password)) {
            Request()->validate([
                'password' => 'min:6|confirmed',
            ]);
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make(Request()->password),
            ];
        } else {
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
            ];
        } 
        User::updateOrCreate(['id' => $id],$data);
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        foreach ($user->getPermissionNames() as $permissionName) {
            $user->revokePermissionTo($permissionName);
        }
        if ($user->delete()) {
            $message = 'Berhasil dihapus';
        } else {
            $message = 'Gagal menghapus';
        }
        return redirect(route('user.index'))->with('message', $message);
    }
}
