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
        Schema::table('vendors', function($table)
        {
            if(Schema::hasColumn('vendors', 'service')){
                $table->dropColumn(array('service'));
            }
            if (!Schema::hasColumn('vendors', 'kategori_id')) {
                $table->unsignedBigInteger('kategori_id')->after('image_banner')->nullable();
                $table->foreign('kategori_id')
                ->references('id')
                ->on('kategories')
                ->onUpdate('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
