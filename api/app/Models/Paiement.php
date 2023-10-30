<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;
    use SoftDeletes;

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
