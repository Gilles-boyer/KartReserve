<?php

namespace Database\Factories;

use App\Models\Alerte;
use App\Models\AlerteReservation;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlerteReservation>
 */
class AlerteReservationFactory extends Factory
{
    protected $model = AlerteReservation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "reservation_id" => Reservation::all()->random()->id,
            "alerte_id" => Alerte::all()->random()->id
        ];
    }
}
