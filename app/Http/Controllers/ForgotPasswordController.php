<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgotPassword');
    }

    public function handleForgot(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'name' => 'required',
    ]);

    $user = User::where('email', $request->email)->where('name', $request->name)->first();

    if (!$user) {
        // Jika user tidak ditemukan
        if (User::where('email', $request->email)->exists()) {
            // Jika email ada dalam database tetapi nama tidak sesuai
            return redirect()->back()->withErrors([
                'name' => 'Informasi name tidak valid atau tidak memiliki izin untuk merubah password.',
            ]);
        } elseif (User::where('name', $request->name)->exists()) {
            // Jika nama ada dalam database tetapi email tidak sesuai
            return redirect()->back()->withErrors([
                'email' => 'Informasi email tidak valid atau tidak memiliki izin untuk merubah password.',
            ]);
        } else {
            // Jika email dan nama tidak ada dalam database
            return redirect()->back()->withErrors([
                'email' => 'Informasi email tidak valid atau tidak memiliki izin untuk merubah password.',
                'name' => 'Informasi name tidak valid atau tidak memiliki izin untuk merubah password.',
            ]);
        }
    } elseif (!in_array($user->role, ['superadmin', 'user'])) {
        // Jika rolenya tidak antara "superadmin" dan "user"
        return redirect()->back()->withErrors([
            'name' => 'Informasi role tidak valid atau tidak memiliki izin untuk merubah password.',
        ]);
    }   

        // Jika verifikasi sukses, arahkan ke form reset password dengan email sebagai parameter
        return redirect()->route('password.reset', $user->email);
    }

    public function showResetForm(Request $request)
    {
        return view('auth.resetPassword', ['email' => $request->email]);
    }

    public function handleReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !in_array($user->role, ['superadmin', 'user'])) {
            return redirect()->back()->withErrors(['email' => 'Email tidak valid atau tidak memiliki izin.']);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password berhasil diubah!');
    }
}
