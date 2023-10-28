<?php

namespace App\Models;

use App\Models\Reservation;
use App\Models\AlerteReservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alerte extends Model
{
    use HasFactory;

    protected $fillable = ["icon", "color", "Message"];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'alerte_reservations');
    }

    public function alerteReservations()
    {
        return $this->hasMany(AlerteReservation::class);
    }
}
