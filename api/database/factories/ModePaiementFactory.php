<?php

namespace Database\Factories;

use App\Models\ModePaiement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModePaiement>
 */
class ModePaiementFactory extends Factory
{
    protected $model = ModePaiement::class;
    static $index = -1;

    public function definition(): array
    {
        self::$index ++;
        $names = ['cb', 'stripe', 'espèce', 'chèque', 'bon cadeau', 'bon de commande', 'pass loisir'];
        return [
            'Nom' => $names[self::$index],
        ];
    }
}
