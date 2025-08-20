<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('nik')->nullable();
            $table->enum('category', ['kuliner', 'kerajinan', 'pertanian', 'perdagangan', 'jasa', 'teknologi', 'lainnya']);
            $table->text('description');
            $table->string('featured_image')->nullable();
            $table->json('product_images')->nullable();
            $table->text('address');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->text('products')->nullable();
            $table->decimal('capital', 15, 2)->nullable();
            $table->decimal('monthly_revenue', 15, 2)->nullable();
            $table->integer('employee_count')->default(0);
            $table->date('established_date')->nullable();
            $table->string('license_number')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkms');
    }
};
