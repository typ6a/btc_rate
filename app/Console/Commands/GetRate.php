<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;

use App\Models\Record;

use App\Http\Controllers\Rate\RateController;

class GetRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:get {provider=blockchain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get BTC rate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {   
        $timeStart = microtime(true);
        $controller = app()->make('App\Http\Controllers\Rate\RateController');

        if ($this->arguments()['provider'] == 'blockchain') {
            app()->call([$controller, 'getBlockchainData'], []);
            $this->info('Last rate data has been got at ' . date("Y-m-d H:i:s") . ' with blockchain provider');
            $diff = microtime(true) - $timeStart;
            $sec = intval($diff);
            $micro = $diff - $sec;
            Log::info(date("Y-m-d H:i:s") . ' data from BLOCKCHAIN provider saved. Execution time ' . number_format(round($micro * 1000, 2), 2, '.', '') . ' ms');
        }
        else {
            app()->call([$controller, 'getCoindeskData'], []);
            $this->info('Last rate data has been got at ' . date("Y-m-d H:i:s") . ' with coindesk provider');
            $diff = microtime(true) - $timeStart;
            $sec = intval($diff);
            $micro = $diff - $sec;
            Log::info(date("Y-m-d H:i:s") . ' data from COINDESC provider saved. Execution time ' . number_format(round($micro * 1000, 2), 2, '.', '') . ' ms');
        }
    }
}
