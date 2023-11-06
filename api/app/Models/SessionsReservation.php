<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionsReservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["reservation_id", "session_id", "Statut"];

    public function reservationFormule()
    {
        return $this->belongsTo(ReservationFormule::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
