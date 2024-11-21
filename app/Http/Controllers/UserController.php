<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function fetchUserDetails($id)
    {
        $user = User::where('rf_id', $id)->orWhere('student_id', $id)->first();
    
        if ($user) {
            return response()->json([
                'image' => $user->profile_image,
                'name' => $user->name,
                'course' => $user->course,
                'section' => $user->section,
                'section1' => $user->section1,
                'time_preference' => $user->time_preference,
                'email' => $user->email,
            ]);
        }
    
        return response()->json(null, 404);
    }
    
}
