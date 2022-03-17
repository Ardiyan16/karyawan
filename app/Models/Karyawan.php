<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_karyawan',
        'nip',
        'jabatan',
        'departemen',
        'tgl_lahir',
        'tahun_lahir',
        'alamat',
        'no_telp',
        'agama',
        'status',
        'foto_ktp'
    ];
}
