<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function is_admin() {
        return $this->name === 'admin';
    }
}
