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
    public function index(Request $request)
    {
        // Mulai query untuk mengambil data User dengan role "admin"
        // dan memiliki nilai "department_id" (bukan NULL).
        $query = User::where('role', 'admin')
                    ->whereNotNull('department_id')
                    // Memuat relasi "department" dari setiap User sekaligus
                    // untuk mengurangi jumlah query ke database (eager loading).
                    ->with('department');

        // Cek apakah ada parameter pencarian ("search") di permintaan dari user.
        if ($request->filled('search')) {
            // Ambil nilai dari parameter "search".
            $search = $request->input('search');
            // Terapkan logika pencarian pada query yang sudah ada.
            $this->applySearchToQuery($query, $search);
        }

        // Eksekusi query dan ambil hasil dengan paginasi (5 hasil per halaman).
        $admins = $query->paginate(5);

        // Cek apakah hasil pencarian kosong DAN ada parameter pencarian dalam request.
        if ($admins->isEmpty() && $request->filled('search')) {
            // Jika ya, tambahkan pesan ke session untuk memberitahu user bahwa
            // pencariannya tidak menghasilkan apa-apa.
            session()->flash('no-result', 'Pencarian Anda tidak menghasilkan hasil apapun.');
        }

        // Mengembalikan view "superadmin.admin.index" dengan data "admins".
        return view('superadmin.admin.index', compact('admins'));
    }

    private function applySearchToQuery($query, $search)
    {
        // Modifikasi query untuk memfilter User berdasarkan kata kunci pencarian.
        $query->where(function ($q) use ($search) {
            // Mencari User yang nama atau email-nya cocok dengan kata kunci pencarian.
            $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                // Mencari User yang memiliki department dengan nama yang cocok
                // dengan kata kunci pencarian.
                ->orWhereHas('department', function ($d) use ($search) {
                    $d->where('name', 'like', '%' . $search . '%');
                });
        });
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
        $admin = User::findOrFail($id);
        return view('admin.show', compact('admin'));
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
