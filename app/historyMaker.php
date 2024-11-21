<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class historyMaker
{
    /**
     * Copy data from attendances to attendance_history and clear attendances table.
     */
    public function __invoke()
    {
        $startTime = microtime(true);
        $currentDateTime = Carbon::now()->toDateTimeString();

        logger()->info("[$currentDateTime] Starting to move data from attendances to attendance_history");

        $attendances = DB::table('attendances')
            ->join('users', 'attendances.user_id', '=', 'users.id')
            ->select('attendances.*', 'users.student_id', 'users.name', 'users.course', 'users.section', 'users.section1', 'users.time_preference')
            ->get();

        if ($attendances->isEmpty()) {
            logger()->info("[$currentDateTime] No data found in attendances table");
            return;
        }

        $attendanceData = $attendances->map(function ($attendance) {
            $attendanceArray = (array) $attendance;
            unset($attendanceArray['id']);
            return $attendanceArray;
        })->toArray();
        

        DB::table('attendance_history')->insert($attendanceData);

        DB::table('attendances')->delete();

        $endTime = microtime(true);
        $timeElapsed = $endTime - $startTime;

        logger()->info("[$currentDateTime] Successfully moved data to attendance_history and cleared attendances table. Time elapsed: {$timeElapsed} seconds");
    }
}
