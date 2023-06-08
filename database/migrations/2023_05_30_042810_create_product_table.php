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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('detail')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('vendor_id');
            $table->longText('terms_and_condition')->nullable();
            $table->decimal('discounted_price', 12, 3)->nullable();
            $table->decimal('price', 12, 3);
            $table->integer('rate');
            $table->string('product_image_1')->nullable();
            $table->string('product_image_2')->nullable();
            $table->string('product_image_3')->nullable();
            $table->string('product_image_4')->nullable();
            $table->enum('status', [1, 0])->default(1);
            $table->timestamps();

            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategories')
                ->onUpdate('cascade');

            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
