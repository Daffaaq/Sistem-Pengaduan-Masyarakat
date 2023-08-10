<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'number_ticket',
        'complaint_id',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate number_ticket before creating a new Complaint
        static::creating(function ($complaint) {
            $complaint->number_ticket = self::generateUniqueTicketNumber();
        });
    }

    private static function generateUniqueTicketNumber()
    {
        // Generate a random number for the ticket
        $randomNumber = rand(10000, 99999);

        // Check if the number already exists, if so, regenerate until a unique number is found
        while (self::where('number_ticket', $randomNumber)->exists()) {
            $randomNumber = rand(10000, 99999);
        }

        return $randomNumber;
    }
}
