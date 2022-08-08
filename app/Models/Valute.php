<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rate;

class Valute extends Model
{
    use HasFactory;

    public function rates() {
        return $this->hasMany(Rate::class);
    }
}
