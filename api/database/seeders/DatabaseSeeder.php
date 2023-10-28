<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlerteReservation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Client::factory(10)->create();
        \App\Models\Alerte::factory(5)->create();
        \App\Models\Formule::factory(10)->create();
        \App\Models\ModePaiement::factory(6)->create();
        \App\Models\Session::factory(40)->create();
        \App\Models\Reservation::factory(10)->create();
        \App\Models\Paiement::factory(10)->create();
        AlerteReservation::factory(3)->create();
    }
}
