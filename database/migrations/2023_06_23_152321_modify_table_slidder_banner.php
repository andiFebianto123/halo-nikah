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
        Schema::table('slider_banners', function($table)
        {
            if(Schema::hasColumn('slider_banners', 'title')){
                $table->string('title')->nullable()->change();
                $table->string('sub_title')->nullable()->change();
                $table->integer('price')->nullable()->change();
                $table->string('button_text')->nullable()->change();
                $table->string('url')->nullable()->change();
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
