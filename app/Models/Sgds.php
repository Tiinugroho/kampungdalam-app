<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sgds extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'sgds';

    // Kolom yang bisa diisi
    protected $fillable = [
        'goal_number',           // Nomor tujuan SDGs
        'goal_name',             // Nama tujuan
        'description',           // Deskripsi tujuan
        'target_code',           // Kode target
        'target_description',    // Deskripsi target
        'indicator_code',        // Kode indikator
        'indicator_description', // Deskripsi indikator
        'unit',                  // Satuan pengukuran
        'year',                  // Tahun data
        'value',                 // Nilai capaian
        'source',                // Sumber data
        'icon',                  // Icon
    ];
}
