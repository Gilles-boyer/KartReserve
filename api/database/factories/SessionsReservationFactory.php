<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionsReservation>
 */
class SessionsReservationFactory extends Factory
{
    static $index = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$index ++;
        return [
            'session_id' => self::$index,
            'Statut' => $this->faker->randomElement(['Prévu', 'En cours', 'Terminé']),
        ];
    }
}
