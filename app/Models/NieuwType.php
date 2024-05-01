<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NieuwType extends Model
{
    use HasFactory;
    public function wonings()
    {
        return $this->hasMany(Woning::class);
    }
}
