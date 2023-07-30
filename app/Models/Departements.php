<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Departements extends Model
{
    use HasFactory;

    protected $table = 'departements';
    protected $fillable = [
        'name',
        'longitude', // Add 'longitude' to the fillable attributes
        'latitude',  // Add 'latitude' to the fillable attributes
    ];

    public function users()
{
    return $this->hasMany(User::class, 'department_id');
}

}
