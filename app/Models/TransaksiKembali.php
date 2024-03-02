<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKembali extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'kd_anggota', 'kd_anggota');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }
}
