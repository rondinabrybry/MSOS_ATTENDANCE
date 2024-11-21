<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\User;

class UserLogoutAttendance extends Controller
{

    public function index(Request $request)
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $existingAttendance = Attendance::where('user_id', $user->id)
            ->whereNotNull('logged_in_at') //check
            ->whereNull('logged_out_at')
            ->first();

        if (!$existingAttendance) {
            return redirect()->back()->with('error', 'You need to time in before you can time out!');
        }

        $existingAttendance->update([
            'logged_out_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Successfully timed out!');
    }

}