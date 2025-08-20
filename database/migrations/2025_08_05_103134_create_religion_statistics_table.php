<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('religion_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('islam')->default(0);
            $table->integer('christian')->default(0);
            $table->integer('catholic')->default(0);
            $table->integer('hindu')->default(0);
            $table->integer('buddha')->default(0);
            $table->integer('confucius')->default(0);
            $table->integer('others')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('religion_statistics');
    }
};
