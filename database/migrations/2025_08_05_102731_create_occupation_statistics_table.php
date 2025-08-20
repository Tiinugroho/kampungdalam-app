<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('occupation_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('farmer')->default(0);
            $table->integer('trader')->default(0);
            $table->integer('civil_servant')->default(0);
            $table->integer('private_employee')->default(0);
            $table->integer('entrepreneur')->default(0);
            $table->integer('fisherman')->default(0);
            $table->integer('laborer')->default(0);
            $table->integer('housewife')->default(0);
            $table->integer('student')->default(0);
            $table->integer('unemployed')->default(0);
            $table->integer('others')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('occupation_statistics');
    }
};
