<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModePaiement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["Nom"];

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
