<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('health_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            // Health Facilities
            $table->integer('puskesmas_count')->default(0);
            $table->integer('pustu_count')->default(0);
            $table->integer('posyandu_count')->default(0);
            $table->integer('clinic_count')->default(0);
            $table->integer('hospital_count')->default(0);
            // Health Personnel
            $table->integer('doctor_count')->default(0);
            $table->integer('nurse_count')->default(0);
            $table->integer('midwife_count')->default(0);
            // Health Indicators
            $table->decimal('infant_mortality_rate', 5, 2)->default(0);
            $table->decimal('maternal_mortality_rate', 5, 2)->default(0);
            $table->decimal('life_expectancy', 5, 2)->default(0);
            // Nutrition
            $table->integer('stunting_cases')->default(0);
            $table->integer('malnutrition_cases')->default(0);
            // Immunization
            $table->decimal('immunization_coverage', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_statistics');
    }
};
