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
        Schema::create('esdeveniments', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->text('descripcio');
            $table->date('data');
            $table->time('hora');
            $table->integer('num_max_assistents');
            $table->integer('edat_minima');
            $table->string('imatge');
            $table->foreignId('categoria_id')->constrained('categories')->onDelete('cascade'); // Relación con categorías
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esdeveniments');
    }
};
