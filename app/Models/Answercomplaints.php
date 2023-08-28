<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departements;
use App\Models\Complaint;
use App\Models\User;
use App\Events\ComplaintAnswered;


class Answercomplaints extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer', 'answer_complaint_date', 'department_id', 'user_id', 'complaint_id', 'time',
    ];

    public function department()
    {
        return $this->belongsTo(Departements::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id');
    }
    protected static function boot()
    {
        parent::boot();

        // Mengubah status komplain yang terkait saat ada penambahan jawaban komplain
        static::created(function ($answer) {
            event(new ComplaintAnswered($answer));
        });
    }
}
