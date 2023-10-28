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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained();
            $table->decimal('Montant', 8, 2);
            // Assuming ModePaiements is another table with ID_ModePaiement as primary key
            // If not, replace this line with:
            //   ->enum("Mode_de_paiement", ["Espece", "Stripe", "Virement", "Bon commande", "Pass Loisir"]);
            // and remove the ModePaiements migration below.
            $table->foreignId('mode_paiement_id')->constrained();
            $table->enum("Statut", ["Payé", "En attente"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
