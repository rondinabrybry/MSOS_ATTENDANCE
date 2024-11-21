<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AttendanceHistoryController extends Controller
{
    // public function showAttendanceHistory(Request $request)
    // {
    //     if (Auth::user()->isAdmin()) {
    //         $attendanceHistory = DB::table('attendance_history')
    //             ->when($request->course, function ($query) use ($request) {
    //                 return $query->where('course', $request->course);
    //             })
    //             ->when($request->section, function ($query) use ($request) {
    //                 return $query->where('section', $request->section);
    //             })
    //             ->when($request->section1, function ($query) use ($request) {
    //                 return $query->where('section1', $request->section1);
    //             })
    //             ->when($request->time_preference, function ($query) use ($request) {
    //                 return $query->where('time_preference', $request->time_preference);
    //             })
    //             ->orderBy('logged_in_at', 'desc')
    //             ->get()
    //             ->groupBy(function ($item) {
    //                 return Carbon::parse($item->logged_in_at)->format('Y-m-d');
    //             });
    //     } else {
    //         return redirect()->route('home');
    //     }
    
    //     return view('admin.attendance_history', compact('attendanceHistory'));
    // }

    public function showAttendanceHistory(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $attendanceHistory = DB::table('attendance_history')
                ->when($request->course, function ($query) use ($request) {
                    return $query->where('course', $request->course);
                })
                ->when($request->section, function ($query) use ($request) {
                    return $query->where('section', $request->section);
                })
                ->when($request->section1, function ($query) use ($request) {
                    return $query->where('section1', $request->section1);
                })
                ->when($request->time_preference, function ($query) use ($request) {
                    return $query->where('time_preference', $request->time_preference);
                })
                ->orderBy('logged_in_at', 'desc')
                ->get()
                ->groupBy(function ($item) {
                    // Group by logged_in_at if available; otherwise, group by logged_out_at
                    return $item->logged_in_at ? 
                        Carbon::parse($item->logged_in_at)->format('Y-m-d') : 
                        Carbon::parse($item->logged_out_at)->format('Y-m-d');
                })
                ->map(function ($dateGroup) {
                    // Further group by course, section, section1, and time_preference
                    return $dateGroup->groupBy(function ($item) {
                        return $item->course . ' ' . $item->section . ' ' . $item->section1 . ' ' . $item->time_preference;
                    });
                });
        } else {
            return redirect()->route('home');
        }
    
        return view('admin.attendance_history', compact('attendanceHistory'));
    }
    
}
