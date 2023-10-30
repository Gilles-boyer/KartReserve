<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory;
    use SoftDeletes;

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
