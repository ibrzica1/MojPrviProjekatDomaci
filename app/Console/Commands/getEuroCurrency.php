<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getEuroCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-euro';

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
        $request = Http::get('https://api.frankfurter.dev/v1/latest');
        $response = $request->json();

        dd($response['rates']['USD']);
    }
}
