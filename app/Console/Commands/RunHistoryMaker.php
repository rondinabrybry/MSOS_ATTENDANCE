<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\historyMaker;

class RunHistoryMaker extends Command
{
    protected $signature = 'history:make';

    protected $description = 'Move data from attendances to attendance_history and clear attendances table';

    public function handle()
    {
        (new historyMaker())();

        $this->info('Attendance data moved to history and attendances table cleared.');
        
        return 0;
    }
}
