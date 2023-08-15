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
        Departements::create([
            'name' => 'Department 1',
            'email' => 'dept1@example.com',
            'link_website' => 'https://dept1.example.com',
            'tugas' => 'Description of Department 1',
            'longitude' => 123.456789, // Example longitude
            'latitude' => -12.345678, // Example latitude
        ]);
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
        User::create([
            'name' => 'Admin',
            'email' => 'dmin@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => 1,
            'role' => 'admin',
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
