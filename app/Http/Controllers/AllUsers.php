<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class AllUsers extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if (Auth::user()->isAdmin()) {
            if ($request->student_id != null) {
                $query->where('student_id', $request->student_id)->orWhere('rf_id', $request->student_id)->first();
            }

            if ($request->course != null) {
                $query->where('course', $request->course);
            }

            if ($request->section != null) {
                $query->where('section', $request->section);
            }

            if ($request->section1 != null) {
                $query->where('section1', $request->section1);
            }

            if ($request->time_preference != null) {
                $query->where('time_preference', $request->time_preference);
            }

            $users = $query->paginate(50);
        } else {
            $users = User::paginate(50);
        }

        return view('admin.users', compact('users'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:users,student_id,' . $request->user_id,
        ], [
            'student_id.unique' => 'The Student ID is already taken.',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->update($request->only(['name', 'course', 'section', 'section1', 'student_id', 'rf_id', 'time_preference']));

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }


    public function getUsertype($id)
    {
        $user = User::select('id', 'usertype')->findOrFail($id);
        return response()->json($user);
    }

    public function promote(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User promoted successfully');
    }

    public function store(UpdateUserRequest $request)
    {
        $existingStudentId = User::where('student_id', $request->student_id)->exists();

        $existingEmail = User::where('email', $request->email)->exists();

        $existingRfId = User::where('rf_id', $request->rf_id)->exists();

        if ($existingStudentId || $existingRfId || $existingEmail) {
            $errorMessage = [];

            if ($existingEmail) {
                $errorMessage[] = 'The Email has already been taken.';
            }

            if ($existingStudentId) {
                $errorMessage[] = 'The Student ID has already been taken.';
            }

            if ($existingRfId) {
                $errorMessage[] = 'The RFID has already been registered.';
            }

            return back()->withErrors($errorMessage)->withInput();
        }

        User::create(array_merge(
            $request->validated(),
            ['password' => bcrypt('12345678')]
        ));
        return redirect()->route('admin.users')->with('success', 'New user added successfully');
    }

    public function manualStore(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
    
        $user = User::where('rf_id', $validated['id'])->orWhere('student_id', $validated['id'])->first();
    
        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found!');
        }
    
        $alreadyLoggedIn = Attendance::where('user_id', $user->id)
            ->whereNotNull('logged_in_at')
            ->exists();
    
        if ($alreadyLoggedIn) {
            return redirect()->route('admin.users')->with('error', 'User already logged in!');
        }
    
        Attendance::create([
            'user_id' => $user->id,
            'logged_in_at' => now(),
        ]);
    
        return redirect()->route('admin.users')->with('success', 'Attendance Recorded');
    }
    

}