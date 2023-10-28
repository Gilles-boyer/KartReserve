<?php

namespace Database\Factories;

use App\Models\Paiement;
use App\Models\Reservation;
use App\Models\ModePaiement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    protected $model = Paiement::class;
    static $index = 0;

    public function definition(): array
    {
        self::$index ++ ;
        return [
            'reservation_id' => self::$index,
            'Montant' => $this->faker->randomFloat(2, 0, 50),
            'mode_paiement_id' => ModePaiement::all()->random()->id,
            "Statut" => $this->faker->randomElement(["Payé", "En attente"]),
        ];
    }
}
