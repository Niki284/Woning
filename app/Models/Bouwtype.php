<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouwtype extends Model
{
    use HasFactory;

    public function woning()
    {
        return $this->hasMany(Woning::class);
    }
}
