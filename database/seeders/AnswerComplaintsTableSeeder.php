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

        // Insert data ke tabel answercomplaints
        Answercomplaints::insert($complaints);

        // Mengubah status komplain yang terkait
        foreach ($complaints as $complaint) {
            $complaintToUpdate = Complaint::find($complaint['complaint_id']);

            // Cek apakah terdapat jawaban pengaduan dengan departemen yang sama
            $hasSameDepartmentAnswer = Answercomplaints::where('complaint_id', $complaintToUpdate->id)
                ->where('department_id', $complaintToUpdate->department_id)
                ->exists();

            // Jika tidak ada jawaban pengaduan dengan departemen yang sama, status tidak berubah
            if ($hasSameDepartmentAnswer) {
                $complaintToUpdate->status = 'resolved';
                $complaintToUpdate->save();
            }
        }
    }
}
