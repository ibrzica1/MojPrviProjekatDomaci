<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getDollarCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-dollar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = Http::get('https://api.frankfurter.dev/v1/latest?base=USD');
        $response = $request->json();

        ExchangeRates::create([
            'currency' => 'USD',
            'value' => $response['rates']['EUR']
        ]);
        
    }
}
