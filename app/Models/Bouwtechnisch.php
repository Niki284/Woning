<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouwtechnisch extends Model
{
    use HasFactory;

    protected $fillable = [
        'woning_id',
        'beglazing',
        'stedenbouwkundige_bestemming',
        'Dagvaarding_stedenbouwkundige',
        'Bouwvergunning',
        'Verkavelingsvergunning',
        'Recht_van_voorkoop',
        'As_built_attest',
        'Beschermd_erfgoed',
    ];

    public function woning()
    {
        return $this->belongsTo(Woning::class);
    }
}
