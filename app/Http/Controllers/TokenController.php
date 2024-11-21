<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TokenController extends Controller
{
    public function generateToken()
    {
        $user = User::find(1);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $token = $user->createToken('attendance-token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}