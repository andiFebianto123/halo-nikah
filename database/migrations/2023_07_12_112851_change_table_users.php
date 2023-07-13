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
        //
        Schema::table('users', function($table){
            if (!Schema::hasColumn('users', 'first_name')) {
                $table->string('first_name')->after('name')->nullable();
            }
            if(!Schema::hasColumn('users', 'last_name')){
                $table->string('last_name')->after('first_name')->nullable();
            }
            if(!Schema::hasColumn('users', 'image')){
                $table->string('image')->after('email')->nullable();
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
