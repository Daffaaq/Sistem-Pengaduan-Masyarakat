<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Departements;
use App\Models\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat departemen
        $departmentA = Departements::create(['name' => 'Departemen A']);

        // Membuat role 'user' tanpa departemen
        $userRole = Roles::create(['name' => 'user']);

        // Membuat role 'superadmin' tanpa departemen
        $superAdminRole = Roles::create(['name' => 'superadmin']);

        // Membuat role 'admin' dengan departemen
        $adminRole = Roles::create(['name' => 'admin']);
        $adminRole->department_id = $departmentA->id;
        $adminRole->save();
    }
}
