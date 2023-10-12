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
        Schema::create('contacto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre", 50);
            $table->string("apellidos", 50); 
            $table->string("telefono", 14);
            $table->string("email")->unique();
            $table->unsignedBigInteger('creadoPor');
            $table->unsignedBigInteger('categoria_id');


            $table->foreign('creadoPor')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
