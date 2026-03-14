<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = ['currency','value'];

    public static function getTodayCurrency($currency)
    {
        $exist = ExchangeRates::where('currency',$currency)
        ->whereDate('created_at',date('Y-m-d'))
        ->first();

        return $exist;
    }
}
