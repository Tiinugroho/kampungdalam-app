<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('infrastructure_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            // Roads
            $table->decimal('paved_road_length', 8, 2)->default(0);
            $table->decimal('unpaved_road_length', 8, 2)->default(0);
            $table->decimal('damaged_road_length', 8, 2)->default(0);
            // Water & Sanitation
            $table->integer('clean_water_access')->default(0);
            $table->integer('proper_sanitation')->default(0);
            $table->integer('waste_management')->default(0);
            // Electricity
            $table->decimal('electricity_coverage', 5, 2)->default(0);
            // Communication
            $table->decimal('internet_coverage', 5, 2)->default(0);
            $table->decimal('mobile_coverage', 5, 2)->default(0);
            // Transportation
            $table->integer('public_transport')->default(0);
            $table->integer('bridge_count')->default(0);
            // Buildings
            $table->integer('government_buildings')->default(0);
            $table->integer('religious_buildings')->default(0);
            $table->integer('market_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('infrastructure_statistics');
    }
};
