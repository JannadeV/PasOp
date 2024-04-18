<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Run the migrations.
    public function up(): void
    {
        Schema::create('oppastijds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('huisdier_id')->constrained();
            $table->dateTime('start');
            $table->dateTime('eind');
            $table->timestamps();
        });
    }

    //Reverse the migrations.
    public function down(): void
    {
        Schema::dropIfExists('oppastijds');
    }
};
