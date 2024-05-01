<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woning_Voorziening extends Model
{
    use HasFactory;
    protected $table = 'woning__voorzienings';
    protected $fillable = ['woning_id', 'voorzienings_id'];
}
