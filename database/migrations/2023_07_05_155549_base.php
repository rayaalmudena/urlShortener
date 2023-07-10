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
        
        Schema::create('url_shorteners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('url', 1000);
            $table->string('string', 255);
            $table->string('custom_alias', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('url_shortener_analitics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('url_shortener_id');
            $table->foreign('url_shortener_id')->references('id')->on('url_shorteners');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::drop('url_shorteners');
        Schema::drop('url_shortener_analitics');
        
    }
};
