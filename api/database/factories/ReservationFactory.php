<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Formule;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\ReservationFormule;
use App\Models\SessionsReservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        return [
            'client_id' => Client::all()->random()->id,
            'Date' => $this->faker->dateTimeBetween('now', '+2 week'),
            'Statut' => $this->faker->randomElement(['Option', 'Réservé', 'En cours', 'Terminé']),
            'Commentaire' => $this->faker->text,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Reservation $reservation) {
            ReservationFormule::factory()->create([
                'reservation_id' => $reservation->id,
                'formule_id' => Formule::all()->random()->id,
                'Nombre_de_personnes' => $this->faker->numberBetween(1, 6),
                'Type_de_session' => $this->faker->randomElement(['adult', 'enfant', 'biplace']),
            ]);
        });
    }
}
