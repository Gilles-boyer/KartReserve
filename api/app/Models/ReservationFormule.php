<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationFormule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['reservation_id', 'formule_id', 'Nombre_de_personnes', 'Type_de_session'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function formule()
    {
        return $this->belongsTo(Formule::class);
    }
}
