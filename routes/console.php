<?php

use App\Console\Commands\PrintLog;
use Illuminate\Support\Facades\Schedule;


Schedule::command(PrintLog::class)->everyFiveSeconds();