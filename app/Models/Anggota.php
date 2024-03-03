<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pinjam()
    {
        return $this->hasMany(TransaksiPinjam::class, 'kd_anggota', 'id');
    }
}
