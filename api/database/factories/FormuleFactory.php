<?php

namespace Database\Factories;

use App\Models\Formule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formule>
 */
class FormuleFactory extends Factory
{
    protected $model = Formule::class;

    public function definition(): array
    {
        return [
            'Nom' => $this->faker->word,
            'url_image' => $this->faker->imageUrl(),
            'Description' => $this->faker->sentence,
            'Prix' => $this->faker->randomFloat(2, 0, 100),
            'nombre_de_session' => $this->faker->numberBetween(1, 10),
        ];
    }
}
