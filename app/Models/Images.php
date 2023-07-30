<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images'; // Menentukan nama tabel secara eksplisit

    protected $fillable = [
        'complaint_id',
        'image_path',
    ];

    // Relasi dengan model Complaint
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
