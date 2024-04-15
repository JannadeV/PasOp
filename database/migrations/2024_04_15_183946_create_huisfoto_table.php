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
        Schema::create('huisfoto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aanvraag_id')->constrained(
                table: 'aanvraag', indexName: 'huisfoto_aanvraaag_id'
            );
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huisfoto');
    }
};
