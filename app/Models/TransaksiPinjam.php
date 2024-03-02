<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPinjam extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pinjams';
    protected $guarded = [];

    public function pengguna()
    {
        return $this->belongsTo(User::class, "id_pengguna", 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, "kd_anggota", "kd_anggota");
    }
}
