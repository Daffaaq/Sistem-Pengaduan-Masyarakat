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

        // Saat model Ticket akan dibuat (sebelum disimpan ke database),
        // kita akan menjalankan tindakan berikut menggunakan event 'creating'.
        // Automatically generate code_ticket before creating a new Ticket
        static::creating(function ($ticket) {
             // Menghasilkan kode unik untuk tiket dengan menggunakan metode generateUniqueTicketCode().
            $ticket->code_ticket = self::generateUniqueTicketCode();
        });
    }

    private static function generateUniqueTicketCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; // Daftar karakter yang diizinkan untuk kode tiket
        $codeLength = 8; // Panjang kode tiket yang diinginkan

        do {
            $randomCode = ''; // Inisialisasi kode acak awal
            $charactersLength = strlen($characters); // Jumlah karakter yang diizinkan

            for ($i = 0; $i < $codeLength; $i++) {
                $randomCode .= $characters[rand(0, $charactersLength - 1)];
            }
        } while (self::where('code_ticket', $randomCode)->exists());

        return $randomCode;
    }
}
