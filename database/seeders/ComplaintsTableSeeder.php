<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;
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
                'user_id' => $user_id,
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
        ];

        // Insert data ke tabel complaints
        Complaint::insert($complaints);

        // Mengubah status contoh komplain
        // $complaintToUpdate = Complaint::where('title', 'Keluhan 1')->first();
        // $complaintToUpdate->status = 'in progress';
        // $complaintToUpdate->save();

        // $complaintToUpdate = Complaint::where('title', 'Keluhan 2')->first();
        // $complaintToUpdate->status = 'resolved';
        // $complaintToUpdate->save();
    }
}
