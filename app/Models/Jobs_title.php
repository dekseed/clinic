<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs_title extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
