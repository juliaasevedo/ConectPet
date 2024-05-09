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
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet');
            $table->foreign('pet')->references('id')->on('pets');
            $table->unsignedBigInteger('vacina');
            $table->foreign('vacina')->references('id')->on('vacinas');
            $table->unsignedBigInteger('veterinario');
            $table->foreign('veterinario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
