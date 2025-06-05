<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    protected $table = 'periksas';
    protected $fillable = [
        'id_janji_periksa',
        'diagnosa',
        'tindakan',
        'resep',
        'biaya',
    ];

    public $timestamps = false;

    public function janjiPeriksa()
    {
        return $this->belongsTo(JanjiPeriksa::class, 'id_janji_periksa');
    }

    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
}
