<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClearBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'balance:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to clear all pending balances.';

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
     * @return int
     */
    public function handle()
    {

        $sevenDaysAgo = now()->subDays(7)->toDateString();
        $orders=Order::where('cleared',0)->whereDate('created_at','<=',$sevenDaysAgo)->get();
        Log::debug(json_encode($orders));
        foreach ($orders as $order) {
            $examiner = User::find($order->examiner_id);
            $examiner->balance = $examiner->balance + ($order->price-$order->commission);
            $examiner->update();
            $updateOrder=Order::find($order->id);

            $updateOrder->cleared_at=Carbon::now()->toDateTimeString();
            $updateOrder->cleared=1;
            $updateOrder->update();
        }
        return 0;
    }
}
