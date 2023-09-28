<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangeEmailController extends Controller
{
    // Menampilkan formulir verifikasi identitas
    public function showVerifyForm()
    {
        return view('auth.verifyIdentity');
    }

    // Meng-handle permintaan verifikasi identitas
    public function verifyIdentity(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Mencari pengguna berdasarkan nama dari input
        $user = User::where('name', $request->name)->first();

        // Jika pengguna dengan nama tersebut tidak ada dalam database
        if (!$user) {
            return redirect()->back()->withErrors([
                'name' => 'Informasi name tidak valid atau tidak memiliki izin untuk merubah email.',
            ]);
        }

        // Memeriksa kecocokan password
        if (!Hash::check($request->password, $user->password)) {
            // Jika password tidak sesuai
            return redirect()->back()->withErrors([
                'password' => 'Informasi password tidak valid atau tidak memiliki izin untuk merubah email.',
            ]);
        }

        // Memeriksa role pengguna
        if (!in_array($user->role, ['superadmin', 'user'])) {
            // Jika rolenya tidak sesuai dengan "superadmin" atau "user"
            return redirect()->back()->withErrors([
                'role' => 'Informasi role tidak valid atau tidak memiliki izin untuk merubah email.',
            ]);
        }

        // Redirect ke halaman perubahan email dengan nama sebagai parameter
        return redirect()->route('email.showChangeForm', ['name' => $user->name]);
    }

    // Menampilkan formulir perubahan email
    public function showChangeEmailForm($name)
    {
        // Temukan pengguna berdasarkan nama
        $user = User::where('name', $name)->first();

        // Jika pengguna tidak ditemukan, arahkan ke halaman sebelumnya dengan pesan error
        if (!$user) {
            return redirect()->back()->withErrors(['name' => 'Nama pengguna tidak valid.']);
        }

        return view('auth.changeEmail', ['user' => $user]);
    }

    // Meng-handle permintaan perubahan email
    public function handleChangeEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = User::find($request->user_id);

        if ($user->email == $request->new_email) {
            // Redirect kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['new_email' => 'Email baru tidak boleh sama dengan email yang saat ini terdaftar.']);
        }
        $user->email = $request->new_email;
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Email berhasil diubah!');
    }
}


