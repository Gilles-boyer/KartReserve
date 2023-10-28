<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formule extends Model
{
    use HasFactory;

    protected $fillable = ['Nom', 'url_image', 'Description', 'Prix', 'nombre_de_session'];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_formules')->withPivot('Nombre_de_personnes', 'Type_de_session');
    }

    public function reservationFormules()
    {
        return $this->hasMany(ReservationFormule::class);
    }
}
