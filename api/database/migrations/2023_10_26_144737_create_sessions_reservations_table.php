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
        Schema::create('sessions_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("reservation_formule_id")->constrained();
            $table->foreignId("session_id")->constrained();
            $table->enum("Statut", ["Prévu", "En cours", "Terminé"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_reservations');
    }
};
