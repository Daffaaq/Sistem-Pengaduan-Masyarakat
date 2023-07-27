<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class polls extends Model
{
    use HasFactory;

    protected $table = 'polls'; // Menyatakan bahwa model ini berkaitan dengan tabel 'polls'

    protected $fillable = ['likes', 'dislikes']; // Kolom yang dapat diisi secara massal
}
