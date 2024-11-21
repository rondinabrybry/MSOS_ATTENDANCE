<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class AttendanceHistory extends Controller
{
    public function history()
    {
        $setting = Setting::firstOrCreate([], ['is_logged_in' => false]);
        return view('admin.attendance_history', ['setting' => $setting]);
    }

    public function getAttendanceData()
    {
        $attendances = DB::table('attendances')
            ->join('users', 'attendances.user_id', '=', 'users.id')
            ->select('users.student_id', 'users.name', 'users.course', 'users.section', 'users.section1', 'users.time_preference', 'attendances.logged_in_at', 'attendances.logged_out_at')
            ->orderBy('users.course')
            ->orderBy('users.section')
            ->orderBy('users.section1')
            ->orderBy('users.time_preference')
            ->get()
            ->groupBy(function ($item) {
                return $item->course . ' ' . $item->section . ' ' . $item->section1 . ' ' . $item->time_preference;
            })
            ->map(function ($group) {
                return [
                    'course' => $group->first()->course,
                    'section' => $group->first()->section,
                    'section1' => $group->first()->section1,
                    'time_preference' => $group->first()->time_preference,
                    'records' => $group->map(function ($record) {
                        return (array) $record;
                    })->toArray(),
                ];
            })
            ->values();
    
        return response()->json($attendances);
    }
    

}
