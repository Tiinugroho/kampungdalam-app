<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('economic_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            // UMKM
            $table->integer('micro_business')->default(0);
            $table->integer('small_business')->default(0);
            $table->integer('medium_business')->default(0);
            $table->integer('large_business')->default(0);
            // Agriculture
            $table->decimal('rice_field_area', 10, 2)->default(0);
            $table->decimal('plantation_area', 10, 2)->default(0);
            $table->decimal('fishpond_area', 10, 2)->default(0);
            // Production
            $table->decimal('rice_production', 10, 2)->default(0);
            $table->decimal('fish_production', 10, 2)->default(0);
            // Income
            $table->decimal('average_income', 15, 2)->default(0);
            $table->decimal('village_income', 15, 2)->default(0);
            // Banking
            $table->integer('bank_branch')->default(0);
            $table->integer('atm_count')->default(0);
            $table->integer('cooperative_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('economic_statistics');
    }
};
