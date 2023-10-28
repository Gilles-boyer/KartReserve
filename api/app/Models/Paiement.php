<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id', 'Montant', 'mode_paiement_id', "Statut"];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function modePaiement()
    {
        return $this->belongsTo(ModePaiement::class);
    }
}
