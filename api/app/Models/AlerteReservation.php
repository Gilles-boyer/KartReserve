<?php

namespace App\Models;

use App\Models\Alerte;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlerteReservation extends Model
{
    use HasFactory;

    protected $fillable = ["reservation_id", "alerte_id"];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function alerte()
    {
        return $this->belongsTo(Alerte::class);
    }
}
