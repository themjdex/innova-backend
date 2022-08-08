<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rate extends Model
{
    use HasFactory;

    public function getJoinedData($date) {
        $rates = DB::table('rates')
        ->join('valutes', function ($join) use ($date) {
            $join->on('rates.valute_id', '=', 'valutes.id')
                 ->where('date', '=', $date);
        })
        ->get();

        return $rates;
    }
}
