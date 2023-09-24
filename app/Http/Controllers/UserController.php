<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\userUpdateRequest;
use Alert;
use Illuminate\Support\Facades\Response; // Tambahkan ini pada bagian atas file controller

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

        // Mendapatkan pengguna yang saat ini terotentikasi
        $user = auth()->user();

        // Cek apakah name dan email yang diberikan sama dengan yang ada di database
        $nameUnchanged = (!isset($data['name']) || $data['name'] === $user->name);
        $emailUnchanged = (!isset($data['email']) || $data['email'] === $user->email);

        // Kita perlu memeriksa apakah password dari request setelah di-hash sama dengan yang ada di database
        $passwordUnchanged = (!isset($data['password']) || \Hash::check($data['password'], $user->password));

        if ($nameUnchanged && $emailUnchanged && $passwordUnchanged) {
            // Semuanya tidak berubah, kembalikan respons false
            return Response::json(['success' => false]);
        }

        // Memeriksa apakah ada perubahan password dan mengenkripsi password baru jika ada
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        // Mengatur peran pengguna sebagai "user"
        $data['role'] = 'user';

        // Memperbarui data profil pengguna dengan data yang telah diubah
        $user->update($data);

        // Jika perubahan profil berhasil, kirimkan respons JSON ke klien
        return Response::json(['success' => true]);
    }
}
