<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Setting;
use App\Models\enable_login;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminController extends Controller
{    public function index(): View
    {
        $timein = enable_login::firstOrCreate([], ['is_enabled' => false]);
        $setting = Setting::firstOrCreate([], ['is_logged_in' => false]);
        return view('admin.dashboard', compact('setting', 'timein'));
    }

    public function toggleLoggedIn(Request $request)
    {
        $settings = Setting::all();

        foreach ($settings as $setting) {
            $setting->is_logged_in = !$setting->is_logged_in;
            $setting->save();
        }

        return redirect()->route('admin.index');
    }

    public function createSession(Request $request)
    {
        Session::put('qr_session', true);

        return response()->json(['url' => route('sessionWindow')]);
    }

    public function sessionWindow(Request $request)
    {
        if (!Session::has('qr_session')) {
            abort(403, 'Unauthorized action.');
        }
    
        $currentDateTime = Carbon::now('Asia/Manila');
    
        return view('session-window', compact('currentDateTime'));
    }

    public function unsetSession(Request $request)
    {
        Session::forget('qr_session');

        return redirect()->route('logout');
    }

    /////
    public function createSessionLogout(Request $request)
    {
        Session::put('qr_session_logout', true);

        return response()->json(['url' => route('sessionWindowLogout')]);
    }

    public function sessionWindowLogout(Request $request)
    {
        if (!Session::has('qr_session_logout')) {
            abort(403, 'Unauthorized action.');
        }

        $currentDateTime = Carbon::now('Asia/Manila');
    
        return view('session-window-logout', compact('currentDateTime'));
    }

    public function unsetSessionLogout(Request $request)
    {
        Session::forget('qr_session_logout');

        return redirect()->route('logout');
    }

}
