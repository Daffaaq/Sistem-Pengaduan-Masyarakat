<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;
use App\Models\User;
use Carbon\Carbon;

class ComplaintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat contoh data pengaduan
        $user_id = 1;
        $department_id = 1;

        $complaints = [];

        // Pengecekan peran pengguna sebelum memasukkan pengaduan
        if ($user_id && $department_id) {
            $user = User::find($user_id);

            // Cek apakah pengguna memiliki peran "user"
            if ($user->role === 'user') {
                $complaints = [
                    [
                        'user_id' => $user_id,
                        'title' => 'Keluhan 1',
                        'complaint_date' => Carbon::now(),
                        'description' => 'Ini adalah contoh keluhan 1',
                        'status' => 'pending',
                        'department_id' => $department_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'user_id' => 2,
                        'title' => 'Keluhan 2',
                        'complaint_date' => Carbon::now(),
                        'description' => 'Ini adalah contoh keluhan 2',
                        'status' => 'pending',
                        'department_id' => $department_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'user_id' => $user_id,
                        'title' => 'Keluhan 3',
                        'complaint_date' => Carbon::now(),
                        'description' => 'Ini adalah contoh keluhan 3',
                        'status' => 'pending',
                        'department_id' => $department_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'user_id' => $user_id,
                        'title' => 'Keluhan 4',
                        'complaint_date' => Carbon::now(),
                        'description' => 'Ini adalah contoh keluhan 4',
                        'status' => 'pending',
                        'department_id' => $department_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ];
            }
        }

        // Insert data ke tabel complaints
        if (!empty($complaints)) {
            // Pengecekan apakah pengguna memiliki peran "user" sebelum memasukkan pengaduan
            foreach ($complaints as $complaint) {
                $user = User::find($complaint['user_id']);
                if ($user->role === 'user') {
                    Complaint::create($complaint);
                }
            }
        }
    }
}
