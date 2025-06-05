<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JanjiPeriksa extends Model
{
    protected $table = 'janji_periksas';
    protected $fillable = [
        'id_dokter',
        'id_pasien',
        'tanggal_periksa',
        'jam_periksa',
        'status',
    ];

    public $timestamps = false;

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');  
    }
    
    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'id_janji_periksa');
    }
}
