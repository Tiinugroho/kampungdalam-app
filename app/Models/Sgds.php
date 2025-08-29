<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sgds extends Model
{
    use HasFactory;

    protected $table = 'sgds';

    protected $fillable = [
        'desa',
        'kecamatan',
        'kabupaten',
        'icon',
        'tahun',
        'desa_tanpa_kemiskinan',
        'desa_tanpa_kelaparan',
        'desa_sehat_sejahtera',
        'pendidikan_desa_berkualitas',
        'keterlibatan_perempuan_desa',
        'desa_layak_air_bersih',
        'desa_berenergi_bersih',
        'pertumbuhan_ekonomi_desa',
        'infrastruktur_desa',
        'ketimpangan_desa',
        'kawasan_desa',
        'konsumsi_produksi_desa',
        'perubahan_iklim_desa',
        'ekosistem_darat_desa',
        'ekosistem_laut_desa',
        'desa_damai',
        'kemitraan_desa',
        'kelembagaan_desa_dinamis',
    ];
}
