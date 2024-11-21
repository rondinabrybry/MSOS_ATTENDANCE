<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\User;

class UserAttendance extends Controller
{

    public function index(Request $request)
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    
    public function store(Request $request)
{
    $user = Auth::user();

    // attendance already?
    $existingAttendance = Attendance::where('user_id', $user->id)
        ->whereDate('logged_in_at', now()->toDateString())
        ->first();

    if ($existingAttendance) {
        return redirect()->back()->with('error', 'You have already timed in today!');
    }

    Attendance::create([
        'user_id' => $user->id,
        'logged_in_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Attendance recorded successfully!');
}



    public function timeInStudents()
    {
        $attendances = Attendance::with('user')
            ->whereNotNull('logged_in_at')
            ->get()
            ->map(function ($attendance) {
                return [
                    'user_id' => $attendance->user_id,
                    'logged_in_at' => $attendance->logged_in_at->format('Y-m-d H:i:s'),
                    'user' => $attendance->user, 
                ];
            });

        return response()->json($attendances);
    }

    
}