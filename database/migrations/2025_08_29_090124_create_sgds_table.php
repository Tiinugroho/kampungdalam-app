<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sgds', function (Blueprint $table) {
            $table->id();
            $table->string('desa');       // Kampung Dalam
            $table->string('kecamatan');  // Siak
            $table->string('kabupaten');  // Siak
            $table->string('icon')->nullable();
            $table->year('tahun');        // 2021 - sekarang

            // Indikator SGDs (2 angka dibelakang koma)
            $table->decimal('desa_tanpa_kemiskinan', 5, 2)->default(0);
            $table->decimal('desa_tanpa_kelaparan', 5, 2)->default(0);
            $table->decimal('desa_sehat_sejahtera', 5, 2)->default(0);
            $table->decimal('pendidikan_desa_berkualitas', 5, 2)->default(0);
            $table->decimal('keterlibatan_perempuan_desa', 5, 2)->default(0);
            $table->decimal('desa_layak_air_bersih', 5, 2)->default(0);
            $table->decimal('desa_berenergi_bersih', 5, 2)->default(0);
            $table->decimal('pertumbuhan_ekonomi_desa', 5, 2)->default(0);
            $table->decimal('infrastruktur_desa', 5, 2)->default(0);
            $table->decimal('ketimpangan_desa', 5, 2)->default(0);
            $table->decimal('kawasan_desa', 5, 2)->default(0);
            $table->decimal('konsumsi_produksi_desa', 5, 2)->default(0);
            $table->decimal('perubahan_iklim_desa', 5, 2)->default(0);
            $table->decimal('ekosistem_darat_desa', 5, 2)->default(0);
            $table->decimal('ekosistem_laut_desa', 5, 2)->default(0);
            $table->decimal('desa_damai', 5, 2)->default(0);
            $table->decimal('kemitraan_desa', 5, 2)->default(0);
            $table->decimal('kelembagaan_desa_dinamis', 5, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sgds');
    }
};
