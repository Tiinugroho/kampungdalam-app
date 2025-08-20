<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('education_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('no_education')->default(0);
            $table->integer('elementary')->default(0);
            $table->integer('junior_high')->default(0);
            $table->integer('senior_high')->default(0);
            $table->integer('diploma')->default(0);
            $table->integer('bachelor')->default(0);
            $table->integer('master')->default(0);
            $table->integer('doctorate')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('education_statistics');
    }
};
