<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Menampilkan formulir lupa password
    public function showForgotForm()
    {
        return view('auth.forgotPassword');
    }

    // Meng-handle permintaan lupa password
    public function handleForgot(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
        'email' => 'required|email',
        'name' => 'required',
    ]);

    // Mencari pengguna berdasarkan email dan nama dari input
    $user = User::where('email', $request->email)->where('name', $request->name)->first();

    $cacheKey = 'attempts_' . $request->ip(); // gunakan IP untuk mengidentifikasi pengguna
    $lockoutKey = 'lockout_' . $request->ip();
    $totalLockoutKey = 'total_lockout_' . $request->ip();
    // Jika pengguna tidak ditemukan
    if (!$user) {
        $attempts = Cache::get($cacheKey, 0) + 1;
        Cache::put($cacheKey, $attempts, 60); // simpan upaya selama 60 detik
        
        if ($attempts % 5 == 0) {
            $lockoutTime = Carbon::now()->addSeconds(10); // 10 detik lockout
            Cache::put($lockoutKey, $lockoutTime, 10); // simpan waktu lockout
            
            $totalAttempts = Cache::get($totalLockoutKey, 0) + $attempts;
            Cache::forever($totalLockoutKey, $totalAttempts); // simpan total upaya
            
            if ($totalAttempts >= 15) {
                // Menghapus nilai cache untuk mengatur ulang upaya pengguna
                Cache::forget($cacheKey); // Menghapus upaya saat ini
                Cache::forget($lockoutKey); // Menghapus waktu lockout
                Cache::forget($totalLockoutKey); // Menghapus total upaya
                return redirect()->route('login')->with('error', 'Anda telah mencoba terlalu banyak, silahkan login kembali.');
            } else {
                return redirect()->back()->with('lockoutTime', $lockoutTime);
            }
        }
        // Jika email ada dalam database tetapi nama tidak sesuai
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
        // Jika pengguna ditemukan tetapi rolenya tidak sesuai dengan "superadmin" atau "user"
        return redirect()->back()->withErrors([
            'name' => 'Informasi role tidak valid atau tidak memiliki izin untuk merubah password.',
        ]);
    }   

        // Jika verifikasi sukses, arahkan ke form reset password dengan email sebagai parameter
        return redirect()->route('password.reset', $user->email);
    }

    // Menampilkan formulir reset password
    public function showResetForm(Request $request)
    {
        return view('auth.resetPassword', ['email' => $request->email]);
    }

    // Meng-handle permintaan reset password
    public function handleReset(Request $request)
    {
        // Validasi input dari formulir reset password
        $request->validate([
            'email' => 'required|email', // Email harus diisi dan valid
            'password' => 'required|confirmed|min:8' // Password harus diisi, cocok dengan konfirmasi, dan minimal 8 karakter
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika pengguna tidak ditemukan atau rolenya tidak sesuai
        if (!$user || !in_array($user->role, ['superadmin', 'user'])) {
            return redirect()->back()->withErrors(['email' => 'Email tidak valid atau tidak memiliki izin.']);
        }

        // Jika password baru sama dengan password lama
        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['Password' => 'Password Sama.']);
        }

        // Mengubah password pengguna dengan password baru yang di-hash
        $user->password = bcrypt($request->password);
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Password berhasil diubah!');
    }
}
