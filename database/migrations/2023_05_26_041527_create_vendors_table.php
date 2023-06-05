<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_profile')->nullable();
            $table->string('image_banner')->nullable();
            $table->string('service');
            $table->string('description')->nullable();
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('rate')->nullable();
            $table->string('sm_instagram')->nullable();
            $table->string('sm_whatsapp')->nullable();
            $table->string('sm_facebook')->nullable();
            $table->string('sm_twitter')->nullable();
            $table->string('youtube_url_1')->nullable();
            $table->string('youtube_url_2')->nullable();
            $table->string('youtube_url_3')->nullable();
            $table->string('youtube_url_4')->nullable();
            $table->enum('status', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
