<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotEmailController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgotEmail');
    }

    public function handleForgot(Request $request)
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

        // Jika semuanya sesuai, arahkan ke halaman yang memungkinkan mereka untuk mengganti email
        return view('auth.showEmail', ['email' => $user->email]);
    }

}
