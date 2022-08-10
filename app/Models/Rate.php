<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rate extends Model
{
    use HasFactory;

    /**
     * Функция-хелпер для join двух таблиц со всеми нужными параметрами
     * @param string $data Дата, за которую требуются данные. Приходит в query-запросе
     * @return Collection $rates Данные из БД
     */
    public function get_joined_data($date) {
        $rates = DB::table('rates')
        ->join('valutes', function ($join) use ($date) {
            $join->on('rates.valute_id', '=', 'valutes.id')
                 ->where('date', '=', $date);
        })
        ->get();

        return $rates;
    }
}
