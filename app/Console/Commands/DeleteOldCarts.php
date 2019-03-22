<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Cart;
use App\Traits\CartTrait;
use Log;

class DeleteOldCarts extends Command
{
    use CartTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:oldcarts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting old carts';

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
        $maxTime = 24;
        $time = Carbon::now()->subHour($maxTime);
        $oldCarts = Cart::where('status','ACTIVE')->where('created_at', '<=', $time)->get();
        
        Log::info("-----------------------------------");
        Log::info("Manejando carros de compra con más de " . $maxTime . "hs");
        Log::info("Fecha límite: " . $time);
        Log::info("-----------------------------------");
        
        $ids = [];
        foreach($oldCarts as $oldCart)
        {
            array_push($ids, $oldCart->id);
        }
        $this->manageOldCarts($ids, 'cancel');
    }
}
