<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionsReservation extends Model
{
    use HasFactory;

    protected $fillable = ["reservation_id", "session_id", "Statut"];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
