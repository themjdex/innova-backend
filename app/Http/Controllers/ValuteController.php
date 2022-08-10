<?php

namespace App\Http\Controllers;

use App\Models\Valute;
use App\Models\Rate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * @property string $url
 */

class ValuteController extends Controller
{
    public $url = 'http://www.cbr.ru/scripts/XML_daily.asp';

    /**
     * Основная функция API, которая возвращает данные на фронт, если они есть, или создает, если их нет, после чего возвращает
     * @param Request $request запрос с фронта
     * @return Collection $rates Данные из БД
     */
    public function index(Request $request) {
        if ($request->has('date')) {
            $rates = Rate::get_joined_data($request->date);
            if (!$rates->count()) {
                $this->add_new_values($request->date);
            } else {
               return $rates;
            }
        } else {
            $rates = Rate::get_joined_data(date('d/m/Y'));

            if (!$rates->count()) {
                $this->add_new_values();
            } else {
                return $rates;
            }
        }

    }

    /**
     * Функция добавления новых данных в БД за новый день
     * @param string $query Query запрос, который при наличии добавится к запросу к API ЦБ
     */
    public function add_new_values($query = '') {
        $checkUrl = $this->url;
        if ($query) {
            $checkUrl = $this->url . '?date_req=' . $query;
        }
        $xml = simplexml_load_string(file_get_contents($checkUrl));
        $valutesData = [];
        foreach ($xml->Valute as $valute) {
            $correctValue = str_replace(',', '.', $valute->Value);
            $valutesData[] = (float) $correctValue;
        }

        $counter = 0;
        foreach ($valutesData as $item) {
            $counter += 1;
            Rate::query()->insert([
                'value' => $item,
                'valute_id' => $counter,
                'date' => date('d/m/Y')
            ]);
        }
    }

    /**
     * Функция перезаписи данных за текущий день при поступлении нового запроса по таймеру с фронта
     */
    public function update() {
        $xml = simplexml_load_string(file_get_contents($this->url));
        $valutesData = [];
        foreach ($xml->Valute as $valute) {
            $correctValue = str_replace(',', '.', $valute->Value);
            $valutesData[] = (float) $correctValue;
        }

        $counter = 0;
        foreach ($valutesData as $item) {
            $counter += 1;
            DB::table('rates')
                ->where('date', date('d/m/Y'))
                ->where('valute_id', $counter)
                ->update(['value' => $item]);
            }
    }
}
