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
        Schema::create('oppastijd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('huisdier_id')->constrained();
            $table->date('datum');
            $table->time('start');
            $table->time('eind');
            $table->foreignId('oppasser_id')->nullable()->constrained(
                table: 'users', indexName: 'oppastijd_user_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oppastijd');
    }
};
