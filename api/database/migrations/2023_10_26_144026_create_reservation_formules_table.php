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
        Schema::create('reservation_formules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained();
            $table->foreignId('formule_id')->constrained();
            $table->integer('Nombre_de_personnes');
            $table->enum('Type_de_session', ['adult', 'enfant', 'biplace']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_formules');
    }
};
