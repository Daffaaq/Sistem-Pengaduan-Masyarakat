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
        // Create departments
        $departmentA = Departements::create(['name' => 'Departemen A']);

        // Create roles

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
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => $departmentA->id,
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
