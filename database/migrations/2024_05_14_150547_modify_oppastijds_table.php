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
        Schema::table('oppastijds', function (Blueprint $table) {
            $table->date('datum')->default("2000-01-01");
            $table->time('start')->change();
            $table->time('eind')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('oppastijds', function(Blueprint $table) {
            $table->dropColumn('datum');
            $table->dateTime('start')->change();
            $table->dateTime('eind')->change();
        });
    }
};
