<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departements;
use App\Models\User;
use App\Models\Images;
use App\Models\Tickets;
use App\Models\Answercomplaints;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'title', 
        'time',
        'complaint_date', 
        'description', 
        'status', 
        'department_id',
        'longitude', // Add 'longitude' to the fillable attributes
        'latitude',  // Add 'latitude' to the fillable attributes
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

    public function images()
    {
        return $this->hasOne(Images::class, 'complaint_id')->withDefault();
    }

    public function ticket()
    {
        return $this->hasOne(Tickets::class);
    }

    public function createTicket()
    {
        // Buat tiket baru yang terkait dengan keluhan ini
        return $this->ticket()->create([
            'status' => 'pending',
        ]);
    }
}
