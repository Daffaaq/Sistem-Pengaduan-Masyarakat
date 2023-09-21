<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\userUpdateRequest;

class UserController extends Controller
{
    public function edit()
    {
        // Mendapatkan pengguna yang saat ini terotentikasi
        $user = auth()->user();

        // Tampilkan halaman edit untuk pengguna dengan role "user"
        return view('masyarakat.profiles.edit', compact('user'));
    }

    public function update(userUpdateRequest $request)
    {
        // Mendapatkan data yang valid dari permintaan (request) pengguna
        $data = $request->validated();

        // Memeriksa apakah ada perubahan password dan mengenkripsi password baru jika ada
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        // Mengatur peran pengguna sebagai "user"
        $data['role'] = 'user';

        // Mendapatkan pengguna yang saat ini terotentikasi
        $user = auth()->user();

        // Memperbarui data profil pengguna dengan data yang telah diubah
        $user->update($data);

        // Mengarahkan pengguna ke halaman dasbor pengguna dengan pesan sukses
        return redirect()->route('user.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

}
