<?php

namespace App\Models;

use App\Models\Alerte;
use App\Models\AlerteReservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['client_id', 'Date', 'nombre_personne', 'Statut', 'Commentaire'];

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
        return $this->belongsToMany(Formule::class, 'reservation_formules')->withPivot('id', 'sessions', 'pilote', 'payed', 'Type_de_session');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function alertes()
    {
        return $this->belongsToMany(Alerte::class, 'alerte_reservations')->withPivot('id');
    }

    public function alerteReservations()
    {
        return $this->hasMany(AlerteReservation::class);
    }
}
