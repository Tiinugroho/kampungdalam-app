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
            $table->string('desa'); // Kampung Dalam
            $table->string('kecamatan'); // Siak
            $table->string('kabupaten'); // Siak
            $table->string('icon')->nullable(); // Siak
            $table->year('tahun'); // 2024

            // Indikator SGDs
            $table->integer('desa_tanpa_kemiskinan')->default(0);
            $table->integer('desa_tanpa_kelaparan')->default(0);
            $table->integer('desa_sehat_sejahtera')->default(0);
            $table->integer('pendidikan_desa_berkualitas')->default(0);
            $table->integer('keterlibatan_perempuan_desa')->default(0);
            $table->integer('desa_layak_air_bersih')->default(0);
            $table->integer('desa_berenergi_bersih')->default(0);
            $table->integer('pertumbuhan_ekonomi_desa')->default(0);
            $table->integer('infrastruktur_desa')->default(0);
            $table->integer('ketimpangan_desa')->default(0);
            $table->integer('kawasan_desa')->default(0);
            $table->integer('konsumsi_produksi_desa')->default(0);
            $table->integer('perubahan_iklim_desa')->default(0);
            $table->integer('ekosistem_darat_desa')->default(0);
            $table->integer('ekosistem_laut_desa')->default(0);
            $table->integer('desa_damai')->default(0);
            $table->integer('kemitraan_desa')->default(0);
            $table->integer('kelembagaan_desa_dinamis')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sgds');
    }
};
