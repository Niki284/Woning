<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woning extends Model
{
    use HasFactory;

    public function woningTypes()
    {
        return $this->belongsTo(WoningType::class , 'woning_type_id' , 'id');
    }

    public function bouwtypes()
    {
        return $this->belongsTo(Bouwtype::class , 'bouwtype_id' , 'id');
    }

    public function nieuwTypes()
    {
        return $this->belongsTo(NieuwType::class , 'nieuwtype_id' , 'id');
    }

    public function voorzieningen()
    {
        return $this->belongsToMany(Voorziningen::class , 'woning__voorzienings' , 'woning_id' , 'voorzienings_id');
    }

    public function technisches()
    {
        return $this->hasOne(Technisch::class , 'woning_id' , 'id');
    }
    public function indeling()
    {
        return $this->hasOne(Indeling::class , 'woning_id' , 'id');
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function makelaar()
    {
        return $this->belongsTo(Makelaar::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
