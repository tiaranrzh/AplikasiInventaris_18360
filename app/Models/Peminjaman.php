<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_inventaris',
        'id_pegawai',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status_peminjaman',
        'jumlah'
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }  

    public function anggota()
    {
        return $this->belongsTo(Pegawai::class);
    }

    }