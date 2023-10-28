<?php

namespace Database\Factories;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    protected $model = Session::class;
    static $timestamp = '7:45';

    public function definition(): array
    {
        $time = strtotime(self::$timestamp) + 15*60;
        self::$timestamp = date('H:i', $time);
        return [
            "heure_debut" => self::$timestamp,
        ];
    }
}
