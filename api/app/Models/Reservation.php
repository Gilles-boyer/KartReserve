<?php

namespace App\Models;

use App\Models\Alerte;
use App\Models\AlerteReservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'Date', 'Statut', 'Commentaire'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function reservationFormules()
    {
        return $this->hasMany(ReservationFormule::class);
    }

    public function sessionsReservations()
    {
        return $this->hasMany(SessionReservation::class);
    }

    public function formules()
    {
        return $this->belongsToMany(Formule::class, 'reservation_formules')->withPivot('Nombre_de_personnes', 'Type_de_session');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'sessions_reservations')->withPivot('Statut');
    }

    public function alertes()
    {
        return $this->belongsToMany(Alerte::class, 'alerte_reservations');
    }

    public function alerteReservations()
    {
        return $this->hasMany(AlerteReservation::class);
    }
}
