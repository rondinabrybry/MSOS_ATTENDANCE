<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id1' => 'required',
        ]);
    
        $user = User::where('rf_id', $validated['id1'])->orWhere('student_id', $validated['id1'])->first();
    
        if ($user) {
            $attendance = Attendance::where('user_id', $user->id)->first();
    
            if ($attendance) {
                if (!is_null($attendance->logged_in_at) && !is_null($attendance->logged_out_at)) {
                    return redirect()->back()->with([
                        'status' => 'Both Attendance are filled.',
                        'logoutDetails' => $user,
                    ]);
                } elseif (!is_null($attendance->logged_in_at) && is_null($attendance->logged_out_at)) {
                    $attendance->update([
                        'logged_out_at' => now(),
                    ]);
                    return redirect()->back()->with([
                        'status' => 'Logout recorded!',
                        'logoutDetails' => $user,
                    ]);
                } elseif (is_null($attendance->logged_in_at) && is_null($attendance->logged_out_at)) {
                    $attendance->update([
                        'logged_out_at' => now(),
                    ]);
                    return redirect()->back()->with([
                        'status' => 'Logout recorded without prior login!',
                        'logoutDetails' => $user,
                    ]);
                } elseif (is_null($attendance->logged_in_at) && !is_null($attendance->logged_out_at)) {
                    return redirect()->back()->with([
                        'status' => 'Already logged out',
                        'logoutDetails' => $user,
                    ]);
                }
            } else {
                Attendance::create([
                    'user_id' => $user->id,
                    'logged_out_at' => now(),
                ]);
                return redirect()->back()->with([
                    'status' => 'Logout recorded without prior login!',
                    'logoutDetails' => $user,
                ]);
            }
        } else {
            // User not found
            return redirect()->back()->with('status', 'User not found!');
        }
    }
    
}
