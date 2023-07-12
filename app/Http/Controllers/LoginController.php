<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->redirectToDashboard();
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan error
        return redirect()->back()->withInput()->withErrors(['login' => 'Invalid credentials']);
    }

    protected function redirectToDashboard()
    {
        $user = Auth::user();

        if ($user->role_id === 3) {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->role_id === 2) {
            return redirect()->intended('/superadmin/dashboard');
        } else {
            return redirect()->intended('/user/dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
