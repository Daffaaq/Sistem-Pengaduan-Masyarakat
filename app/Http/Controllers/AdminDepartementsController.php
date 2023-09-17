<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departements;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Support\Facades\Crypt;

class AdminDepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role', 'admin')
            ->whereNotNull('department_id')
            ->with('department') // Load the related department
            ->paginate(5);

        return view('superadmin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departements::all();
        return view('superadmin.admin.tambah-admin', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'department_id' => 'required',
    //     ]);

    //     $data['password'] = bcrypt($data['password']);

    //     // Tambahkan role sebagai 'admin' secara otomatis
    //     $data['role'] = 'admin';

    //     User::create($data);

    //     return redirect()->route('superadmin.admin.index')->with('success', 'User created successfully.');
    // }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'admin';

        User::create($data);

        return redirect()->route('superadmin.admin.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        $departements = Departements::all();
        return view('superadmin.admin.edit-admin', compact('admin', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'department_id' => 'required',
    //     ]);

    //     $data['password'] = bcrypt($data['password']);
    //     $data['role'] = 'admin';

    //     $user = User::findOrFail($id);
    //     $user->update($data);

    //     return redirect()->route('superadmin.admin.index')->with('success', 'User updated successfully.');
    // }
    public function update(AdminUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'admin';

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('superadmin.admin.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('superadmin.admin.index')->with('success', 'User deleted successfully.');
    }
}
