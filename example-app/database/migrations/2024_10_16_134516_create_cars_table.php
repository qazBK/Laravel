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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->integer('color_id'); 
            $table->foreign('color_id')->references('id')->on('colors'); 
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
