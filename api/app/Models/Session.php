<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ["heure_debut"];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'sessions_reservations')->withPivot('Statut');
    }

    public function sessionsReservations()
    {
        return $this->hasMany(SessionReservation::class);
    }
}
