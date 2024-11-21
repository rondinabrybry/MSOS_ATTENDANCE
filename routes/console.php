<?php

use App\historyMaker;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// The command for the inspiring quote
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Add the history-making process to the schedule
Artisan::command('move:attendances-to-history', function () {
    (new historyMaker())();
})->purpose('Move attendance data to history');

// Scheduling the command to run daily at midnight
Schedule::command('move:attendances-to-history')->dailyAt('00:00');
