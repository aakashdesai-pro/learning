<?php

namespace App\Console\Commands;

use App\Models\User;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;
use function Laravel\Prompts\info as terminalInfo;
use function Laravel\Prompts\error;
use function Laravel\Prompts\warning;
use function Laravel\Prompts\alert;

class ShowAppDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:detail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will used to show app details.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $name = text(
        //     label:"what is you name ?",
        //     required: true,
        //     hint: "like, Alex"
        // );

        // $dropdown = select(
        //     label: "Select gender",
        //     options: [
        //         "Male",
        //         "Female"
        //     ]
        // );


        error('This is error');
        warning('This is warning');
        alert('This is alert');
    }
}
