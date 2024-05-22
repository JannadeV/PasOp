2024_04_16_134570_create_aanvraags_table.php
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
        Schema::table('aanvraags', function (Blueprint $table) {
            $table->dropForeign(['oppastijd_id']);
            $table->dropColumn('oppastijd_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aanvraags', function (Blueprint $table) {
            $table->foreignId('oppastijd_id')->constrained();
        });
    }
};
