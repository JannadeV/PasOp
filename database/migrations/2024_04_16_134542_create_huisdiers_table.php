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
        Schema::create('huisdiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('baasje_id')->constrained(
                table: 'users', indexName: 'huisdier_user_id'
            );
            $table->string('soort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huisdiers');
    }
};
