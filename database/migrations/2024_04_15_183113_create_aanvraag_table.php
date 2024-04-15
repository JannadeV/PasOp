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
        Schema::create('aanvraag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oppastijd_id')->constrained();
            $table->foreignId('oppasser_id')->constrained(
                table: 'users', indexName: 'aanvraag_oppasser_id'
            );
            $table->boolean('antwoord')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aanvraag');
    }
};
