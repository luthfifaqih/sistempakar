<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = "t_konsultasi";

    protected $fillable = [
        'pertanyaan', 'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function jawaban()
    {
        return $this->hasMany(JawabanKonsultasi::class, 'id_konsultasi', 'id_konsultasi');
    }
}
