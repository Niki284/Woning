<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulier extends Model
{
    use HasFactory;

    protected $table = 'formuliers';
    protected $fillable = ['naam', 'email', 'telefoonnummer', 'bericht'];

    public function woning()
    {
        return $this->belongsTo(Woning::class , 'woning_id' , 'id');
    }
}
