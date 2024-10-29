<?php

namespace App\Jobs;

use App\Models\VMM;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DistributeVMMCoins implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $vmm;

    /**
     * Create a new job instance.
     */
    public function __construct(VMM $vmm)
    {
        $this->vmm = $vmm;
    }

    public function handle()
    {
        //For VMM coin distribution 
        $totalCoins = $this->vmm->distribute_coin;
        $executionTime = $this->vmm->execution_time;
        $coinPerSecond = floor($totalCoins / $executionTime);

        // Example Logic: coin distribution
        foreach (range(1, $executionTime) as $second) {
            
            /* $selectedUser =
            $selectedUser->increment('vmm_coins', $coinPerSecond); */
        }

        // VMM satus update
        $this->vmm->update(['status' => 'finished']);
    }
}
