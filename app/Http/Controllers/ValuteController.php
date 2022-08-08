<?php

namespace App\Http\Controllers;

use App\Models\Valute;
use App\Models\Rate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ValuteController extends Controller
{
    public $url = 'http://www.cbr.ru/scripts/XML_daily.asp';

    public function index(Request $request) {
        if ($request->has('date')) {
            $rates = Rate::getJoinedData($request->date);
            if (!$rates->count()) {
                $this->addNewValues($request->date);
            } else {
               return $rates;
            }
        } else {
            $rates = Rate::getJoinedData(date('d/m/Y'));

            if (!$rates->count()) {
                $this->addNewValues();
            } else {
                return $rates;
            }
        }

    }

    public function addNewValues($query = '') {
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

        $this->index();
    }
    public function add() {
        return 'ass';
    }
}
