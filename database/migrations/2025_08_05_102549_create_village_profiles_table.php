<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('village_name')->default('Kampung Dalam');
            $table->string('village_code')->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('about')->nullable();
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->integer('total_population')->default(0);
            $table->integer('total_families')->default(0);
            $table->decimal('area_size', 10, 2)->default(0);
            $table->integer('total_rt')->default(0);
            $table->integer('total_rw')->default(0);
            $table->string('map_embed_url')->nullable();

            // Tambahan batas wilayah
            $table->text('boundary_north')->nullable();
            $table->text('boundary_south')->nullable();
            $table->text('boundary_east')->nullable();
            $table->text('boundary_west')->nullable();

            $table->text('village_boundaries')->nullable(); // masih bisa dipakai untuk ringkasan umum
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('contact_address')->nullable();
            $table->string('website')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('village_profiles');
    }
};
