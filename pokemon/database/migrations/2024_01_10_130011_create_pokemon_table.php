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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->enum('type',['normal','fire','water','grass','electric','ice','fighting','psychic','bug','rock','ghost','dragon','dark','steel','fairy']);
            $table->enum('subtype',['normal','fire','water','grass','electric','ice','fighting','psychic','bug','rock','ghost','dragon','dark','steel','fairy'])->nullable();
            $table->enum('region',['kanto', 'johto', 'hoenn', 'sinnoh', 'teselia', 'kalos', 'alola', 'galar', 'paldea']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};