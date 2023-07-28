<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departements;
use App\Models\User;
use App\Models\Answercomplaints;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'complaint_date', 'description', 'image', 'status', 'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Departements::class, 'department_id');
    }

    public function answerComplaint()
    {
        return $this->hasMany(Answercomplaints::class, 'complaint_id');
    }
}
