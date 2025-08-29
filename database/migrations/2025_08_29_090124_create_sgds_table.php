<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sgds', function (Blueprint $table) {
            $table->id();
            $table->string('goal_number'); // Nomor Tujuan SDGs, misal: 1, 2, 3...
            $table->string('goal_name'); // Nama Tujuan, misal: "Tanpa Kemiskinan"
            $table->text('description')->nullable(); // Deskripsi tujuan
            $table->string('target_code')->nullable(); // Kode Target, misal: 1.1, 1.2
            $table->text('target_description')->nullable(); // Deskripsi target
            $table->string('indicator_code')->nullable(); // Kode indikator, misal: 1.1.1
            $table->text('indicator_description')->nullable(); // Deskripsi indikator
            $table->string('unit')->nullable(); // Satuan pengukuran, misal: %
            $table->string('year')->nullable(); // Tahun pencapaian data
            $table->decimal('value', 15, 2)->nullable(); // Nilai capaian
            $table->string('source')->nullable(); // Sumber data
            $table->string('icon')->nullable(); // Sumber data
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sgds');
    }
};
