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
        // Mulai dengan membuat query dasar untuk mendapatkan User dengan role 'admin' dan memiliki department_id
        $query = User::where('role', 'admin')
                ->whereNotNull('department_id') // Pastikan bahwa department_id bukan NULL
                ->with('department'); // Ambil relasi "department" bersamaan untuk mengurangi jumlah query ke database (Optimalisasi)

        // Cek apakah ada parameter pencarian di dalam permintaan dari user
        if ($request->has('search')) {
            $search = $request->input('search'); // Ambil kata kunci pencarian dari permintaan

            // Modifikasi query untuk mencari berdasarkan kata kunci
            $query->where(function ($q) use ($search) {
                // Cari User berdasarkan nama atau email yang cocok dengan kata kunci pencarian
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')

                    // Juga cek apakah ada department dengan nama yang cocok dengan kata kunci pencarian
                    ->orWhereHas('department', function ($d) use ($search) {
                        $d->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // Eksekusi query dan ambil hasilnya dengan paginasi (5 hasil per halaman)
        $admins = $query->paginate(5);

        // Jika hasil pencarian kosong, ambil semua admin
        if ($admins->isEmpty() && $request->filled('search')) {
            // Dalam kondisi ini, $admins->isEmpty() memeriksa apakah hasil dari query sebelumnya (dengan kata kunci pencarian) tidak menghasilkan data apapun.
            // $request->has('search') memastikan bahwa kondisi ini hanya berlaku jika ada permintaan pencarian yang dilakukan.

            // Jika kedua kondisi di atas terpenuhi, maka:

            $admins = User::where('role', 'admin')      // Ambil semua user dengan role 'admin'
                    ->whereNotNull('department_id')   // Pastikan bahwa department_id bukan NULL
                    ->with('department')              // Ambil relasi "department" bersamaan untuk mengurangi jumlah query ke database (Optimalisasi)
                    ->paginate(5);                    // Eksekusi query dan ambil hasilnya dengan paginasi (5 hasil per halaman)

            // Setelah melakukan query di atas, Anda akan mendapatkan daftar semua admin (tanpa filter pencarian) untuk ditampilkan.

            // Beri notifikasi kepada pengguna bahwa pencarian yang mereka lakukan tidak menghasilkan data apapun.
            session()->flash('no-result', 'Pencarian Anda tidak menghasilkan hasil apapun.');
        }

        $hasSearch = $request->has('search');
        // Tampilkan hasil ke dalam view 'superadmin.admin.index' dengan variabel $admins
        return view('superadmin.admin.index', compact('admins','hasSearch'));
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
