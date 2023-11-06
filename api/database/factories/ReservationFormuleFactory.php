<?php

namespace Database\Factories;

use App\Models\Session;
use App\Models\ReservationFormule;
use App\Models\SessionsReservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservationFormule>
 */
class ReservationFormuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ReservationFormule $reservation_formule) {
            SessionsReservation::factory($reservation_formule->formule->nombre_de_session)->create([
                'reservation_formule_id' => $reservation_formule->id,
            ]);
        });
    }
}
