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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->date('birth_date');
            $table->string('phone_number', 9);
            //Posem la PK de la 1 (user) com a FK a la taula student
            $table->foreignId('user_id')
                  ->constrained()
                  ->OnDelete('cascade');
            //Posem la PK de la 1 (cicle) com a FK a la taula student
            $table->foreignId('cicle_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
