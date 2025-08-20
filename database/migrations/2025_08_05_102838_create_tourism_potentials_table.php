<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tourism_potentials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('address');
            $table->text('description');
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->string('location')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->json('facilities')->nullable();
            $table->json('activities')->nullable();
            $table->string('opening_hours')->nullable();
            $table->decimal('ticket_price', 10, 2)->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('access_route')->nullable();
            $table->enum('difficulty_level', ['mudah', 'sedang', 'sulit'])->default('mudah');
            $table->integer('estimated_duration')->nullable(); // in minutes
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tourism_potentials');
    }
};
