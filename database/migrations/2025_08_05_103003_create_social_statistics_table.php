<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('social_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            // Social Programs
            $table->integer('pkh_recipients')->default(0);
            $table->integer('blt_recipients')->default(0);
            $table->integer('bpnt_recipients')->default(0);
            $table->integer('kip_recipients')->default(0);
            $table->integer('kis_recipients')->default(0);
            // Organizations
            $table->integer('youth_organization')->default(0);
            $table->integer('women_organization')->default(0);
            $table->integer('farmer_group')->default(0);
            $table->integer('fisherman_group')->default(0);
            // Cultural
            $table->integer('art_group')->default(0);
            $table->integer('cultural_event')->default(0);
            $table->integer('sports_facility')->default(0);
            // Crime & Safety
            $table->integer('crime_cases')->default(0);
            $table->integer('accident_cases')->default(0);
            $table->integer('disaster_cases')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_statistics');
    }
};
