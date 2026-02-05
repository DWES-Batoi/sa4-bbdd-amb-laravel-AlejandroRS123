<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Añadir nuevos campos
        Schema::table('partits', function (Blueprint $table) {
            $table->integer('gols_local')->nullable()->after('gols');
            $table->integer('gols_visitant')->nullable()->after('gols_local');
        });
        
        // Migrar datos existentes del campo 'gols' a los nuevos campos
        DB::table('partits')->whereNotNull('gols')->chunkById(100, function ($partits) {
            foreach ($partits as $partit) {
                $gols = explode('-', $partit->gols ?? '0-0');
                $gl = isset($gols[0]) ? (int) trim($gols[0]) : 0;
                $gv = isset($gols[1]) ? (int) trim($gols[1]) : 0;
                
                DB::table('partits')
                    ->where('id', $partit->id)
                    ->update([
                        'gols_local' => $gl,
                        'gols_visitant' => $gv
                    ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partits', function (Blueprint $table) {
            $table->dropColumn(['gols_local', 'gols_visitant']);
        });
    }
};