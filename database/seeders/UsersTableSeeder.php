<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Departements;
use App\Models\polls;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => null,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => null,
            'role' => 'superadmin',
        ]);
        $polls = [
            [
                'likes' => 0,
                'dislikes' => 0,
            ],
            // Tambahkan data polling lainnya sesuai kebutuhan
        ];
        foreach ($polls as $poll) {
            polls::create($poll);
        }
    }
}
