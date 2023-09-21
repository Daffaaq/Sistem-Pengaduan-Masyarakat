<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\userUpdateRequest;

class UserController extends Controller
{
    public function edit()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Tampilkan halaman edit untuk pengguna dengan role "user"
        return view('masyarakat.profiles.edit', compact('user'));
    }

    public function update(userUpdateRequest $request)
    {
        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $data['role'] = 'user';

        // Get the currently authenticated user
        $user = auth()->user();

        $user->update($data);

        return redirect()->route('user.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

}
