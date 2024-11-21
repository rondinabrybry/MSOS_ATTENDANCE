<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
    
        $user = User::where('rf_id', $validated['id'])
            ->orWhere('student_id', $validated['id'])
            ->first();
    
        if ($user) {
            $attendance = Attendance::where('user_id', $user->id)
                ->latest('created_at')
                ->first();
    
            if ($attendance) {
                if (is_null($attendance->logged_in_at) && !is_null($attendance->logged_out_at)) {
                    $attendance->update([
                        'logged_in_at' => now(),
                    ]);
    
                    return redirect()->back()->with([
                        'timeinsuccess' => 'Attendance Recorded',
                        'userDetails' => $user,
                    ]);
    
                } elseif (!is_null($attendance->logged_in_at) && !is_null($attendance->logged_out_at)) {
                    return redirect()->back()->with([
                        'timeinerror' => 'User is already logged in and logged out!',
                        'userDetails' => $user,
                    ]);
    
                } elseif (!is_null($attendance->logged_in_at) && is_null($attendance->logged_out_at)) {
                    return redirect()->back()->with([
                        'timeinerror' => 'User is already logged in!',
                        'userDetails' => $user,
                    ]);
                }
            } else {
                Attendance::create([
                    'user_id' => $user->id,
                    'logged_in_at' => now(),
                ]);
    
                return redirect()->back()->with([
                    'timeinsuccess' => 'User logged in successfully!',
                    'userDetails' => $user,
                ]);
            }
        } else {
            return redirect()->back()->with('timeinerror', 'User not found!');
        }
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
