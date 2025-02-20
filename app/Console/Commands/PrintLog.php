<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PrintLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is demo command to print log.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info(now()->format('d-m-Y h:i:s'));
    }
}
