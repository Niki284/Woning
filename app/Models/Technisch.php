<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technisch extends Model
{
    use HasFactory;

    public function woning()
    {
        return $this->belongsTo(Woning::class , 'woning_id' , 'id');
    }
}

