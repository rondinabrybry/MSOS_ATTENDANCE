<?php

namespace App\Http\Controllers;

use App\Models\enable_login;
use Illuminate\Http\RedirectResponse;

class updateTimeInBtn extends Controller
{
    public function updateBoolean($id): RedirectResponse
    {
        $record = enable_login::findOrFail($id);
        $record->is_enabled = !$record->is_enabled; 
        $record->save();

        return redirect()->back()->with('success', 'Time-IN status updated successfully!');
    }
}