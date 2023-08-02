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
        Schema::create('params', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //peticion del refresh token           
            $table->string('code');
            $table->string('redirect_url');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('grant_type');
            $table->string('refresh_token');

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('params');
    }
};
