<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDiagnosis extends Model
{
    use HasFactory;

    protected $table = 't_diagnosis';

    protected $guarded = [];

    public function jenis() {
        return $this->hasOne(MasterJenis::class, 'id', 'm_jenis_id');
    }
}
