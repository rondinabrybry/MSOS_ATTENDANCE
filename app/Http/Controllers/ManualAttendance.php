<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManualAttendance extends Controller
{
    public function index() {
        return view('admin.manual');
    }
}
