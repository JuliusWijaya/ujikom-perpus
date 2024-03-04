<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Illuminate\Events\queueable;

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

    protected static function booted(): void
    {
        // Events ketika pengembalian buku dibuat maka status buku akan menjadi active kembali
        static::created(function ($transaksikembali) {
            Koleksi::where('kd_koleksi', $transaksikembali->kd_koleksi)->update([
                'status'  => 'active',
            ]);
        });
    }
}
