<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Departements;
use App\Models\Roles;

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
        $departmentB = Departements::create(['name' => 'Departemen B']);
        $departmentC = Departements::create(['name' => 'Departemen C']);

        // Create roles
        $roleUser = Roles::where('name', 'user')->first();
        $roleSuperAdmin = Roles::where('name', 'superadmin')->first();
        $roleAdmin = Roles::where('name', 'admin')->first();
        // $roleUser = Roles::create(['name' => 'user']);
        // $roleSuperAdmin = Roles::create(['name' => 'superadmin']);
        // $roleAdmin = Roles::create(['name' => 'admin']);

        // Create users
        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'role_user' => $roleUser->id,
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'role_user' => $roleSuperAdmin->id,
        ]);

        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'department_id' => $departmentA->id,
            'role_user' => $roleAdmin->id,
        ]);
    }
}