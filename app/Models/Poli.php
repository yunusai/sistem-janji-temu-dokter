<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    //
    protected $table = 'polis';
    protected $fillable = ['nama', 'deskripsi'];

    public function dokter()
    {
        return $this->hasMany(User::class, 'id_poli');
    }
}
