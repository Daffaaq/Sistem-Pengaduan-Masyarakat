<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Complaint;
use App\Models\Answercomplaints;

class AnswerComplaintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat contoh data jawaban pengaduan
        $complaints = [
            [
                'answer' => 'Ini adalah jawaban untuk keluhan 1',
                'answer_complaint_date' => Carbon::now(),
                'department_id' => 1,
                'user_id' => 1,
                'complaint_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'answer' => 'Ini adalah jawaban untuk keluhan 2',
                'answer_complaint_date' => Carbon::now(),
                'department_id' => 2,
                'user_id' => 2,
                'complaint_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'answer' => 'Ini adalah jawaban untuk keluhan 3',
                'answer_complaint_date' => Carbon::now(),
                'department_id' => 1,
                'user_id' => 3,
                'complaint_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($complaints as $complaint) {
            $complaintToUpdate = Complaint::find($complaint['complaint_id']);

            // Cek apakah komplain dan jawaban pengaduan memiliki departemen yang sama
            if ($complaintToUpdate->department_id == $complaint['department_id']) {
                // Insert data jawaban pengaduan jika departemen sama
                Answercomplaints::create($complaint);

                // Ubah status komplain menjadi 'resolved'
                $complaintToUpdate->status = 'resolved';
                $complaintToUpdate->save();
            } else {
                // Tidak menyimpan data jawaban pengaduan jika departemen tidak sama
                // Status komplain tetap 'pending'
            }
        }
    }
}
