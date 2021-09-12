<?php

namespace App\Console\Commands;

use App\Services\ECommerce\WooCommerceService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class WooCommerceTestCommand extends Command
{
    public WooCommerceService $wooCommerceService;  
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'woo:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->wooCommerceService = new WooCommerceService();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
            //ck_fa9c7f67685a4912d91164b74dd6fd8750b310da
            //secret : cs_d1cbab3c3a9f81a5b7fe2b20c51e1add787877ce
       /* $result =Http::get('https://www.ramomen.co/wootest/wp-json/wc/v3/products?consumer_key=ck_fa9c7f67685a4912d91164b74dd6fd8750b310da&consumer_secret=cs_d1cbab3c3a9f81a5b7fe2b20c51e1add787877ce');
        dd($result->json());
        */
        $ck = "ck_fa9c7f67685a4912d91164b74dd6fd8750b310da";
        $cs = "cs_d1cbab3c3a9f81a5b7fe2b20c51e1add787877ce";
        $baseUrl = "https://www.ramomen.co/wootest/";
        $suffix = "wp-json/wc/v3/products";
          
        $result = $this->wooCommerceService->get($ck,$cs,$suffix,$baseUrl);
        dd($result);
    }
}
