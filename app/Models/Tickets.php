<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_ticket',
        'complaint_id',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate code_ticket before creating a new Ticket
        static::creating(function ($ticket) {
            $ticket->code_ticket = self::generateUniqueTicketCode();
        });
    }

    private static function generateUniqueTicketCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; // Karakter yang diizinkan
        $codeLength = 8; // Panjang kode tiket

        $randomCode = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $codeLength; $i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1)];
        }

        // Periksa apakah kode tersebut sudah ada, jika iya, hasilkan ulang hingga ditemukan kode yang unik
        while (self::where('code_ticket', $randomCode)->exists()) {
            $randomCode = '';
            for ($i = 0; $i < $codeLength; $i++) {
                $randomCode .= $characters[rand(0, $charactersLength - 1)];
            }
        }

        return $randomCode;
    }
}
