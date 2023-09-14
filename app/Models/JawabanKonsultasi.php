<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanKonsultasi extends Model
{
    use HasFactory;

    protected $table = "t_jawaban_konsultasi";

    protected $fillable = [
        'id_konsultasi', 'jawaban', 'pakar'
    ];

    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class, 'id_konsultasi', 'id_konsultasi');
    }
}
