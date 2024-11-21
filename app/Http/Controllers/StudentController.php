<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $students = User::when($request->course != null, function ($q) use ($request) {
                return $q->where('course', $request->course);
            }, function ($q) {
                $q->with('attendances');
            })
            ->when($request->section != null, function ($q) use ($request) {
                return $q->where('section', $request->section);
            })
            ->when($request->section1 != null, function ($q) use ($request) {
                return $q->where('section1', $request->section1);
            })
            ->when($request->time_preference != null, function ($q) use ($request) {
                return $q->where('time_preference', $request->time_preference);
            })
            ->get();
        } else {
            $authUser = auth()->user();
            $students = User::where('course', $authUser->course)
                ->where('section', $authUser->section)
                ->where('section1', $authUser->section1)
                ->where('time_preference', $authUser->time_preference)
                ->when($request->course != null, function ($q) use ($request) {
                    return $q->where('course', $request->course);
                })
                ->when($request->section != null, function ($q) use ($request) {
                    return $q->where('section', $request->section);
                })
                ->when($request->time_preference != null, function ($q) use ($request) {
                    return $q->where('time_preference', $request->time_preference);
                })
                ->with('attendances')
                ->get();
        }
    
        return view('students.index', compact('students'));
    }
    

    public function exportPdf(Request $request)
    {
        $students = User::with('attendances')->get();
    
        $image_path = public_path('storage/M-SOS.png');
        $image_data = base64_encode(file_get_contents($image_path));
        $image_src = 'data:image/png;base64,' . $image_data;
    
        $pdf = Pdf::loadView('students.pdf', compact('students', 'image_src'));
    
        return $pdf->download('students-attendance.pdf');
    }
    
}
