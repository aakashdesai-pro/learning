<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DummyUserInsertJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $count
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::factory($this->count)->create();
    }
}
