<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('population_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('total_population');
            $table->integer('male_population');
            $table->integer('female_population');
            $table->integer('total_families');
            $table->integer('age_0_4')->default(0);
            $table->integer('age_5_9')->default(0);
            $table->integer('age_10_14')->default(0);
            $table->integer('age_15_19')->default(0);
            $table->integer('age_20_24')->default(0);
            $table->integer('age_25_29')->default(0);
            $table->integer('age_30_34')->default(0);
            $table->integer('age_35_39')->default(0);
            $table->integer('age_40_44')->default(0);
            $table->integer('age_45_49')->default(0);
            $table->integer('age_50_54')->default(0);
            $table->integer('age_55_59')->default(0);
            $table->integer('age_60_64')->default(0);
            $table->integer('age_65_plus')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('population_statistics');
    }
};
