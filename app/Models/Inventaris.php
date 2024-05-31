<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_inventaris';

    protected $fillable = [

        'nama',

        'kondisi',

        'keterangan',

        'jumlah',

        'id_jenis',

        'tanggal_register',

        'id_ruang',

        'kode_inventaris',

        'id_petugas',

    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}