<?php

namespace App\Console\Commands;

use App\Http\Controllers\InStockController;
use App\Models\Instock;
use App\Notifications\StockUpdate;
use Illuminate\Console\Command;
use App\Models\User;

class SendAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stock Check';

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
        while (true) {
            $instocks = Instock::where('active',1)->get();
            foreach ($instocks as $stock) {
                $status = InStockController::checkStock($stock->url);
         
                if ($status == "1") {
                    // InStockController::sendAlert($stock->url, $stock->product);
                    if(User::where('id',$stock->user_id)->exists()){
                    $user = User::find($stock->user_id);
                    $user->notify(new StockUpdate($stock->url,$stock->product));
                    Instock::where('id', $stock->id)->update(['status' => $status]);
                    echo "ok";
                    }
                } else {
                    Instock::where('id', $stock->id)->update(['status' => 0]);
                }
            }
            sleep(3);
        }
    }
}
