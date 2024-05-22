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
        Schema::create('aanvraag_oppastijd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aanvraag_id')->constrained()->onDelete('cascade');
            $table->foreignId('oppastijd_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aanvraag_oppastijd');
    }
};
