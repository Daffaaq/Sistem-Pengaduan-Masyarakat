<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\User;
use App\Models\Answercomplaint;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'complaint_date', 'description', 'status', 'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function answerComplaint()
    {
        return $this->hasOne(Answercomplaint::class);
    }
}
