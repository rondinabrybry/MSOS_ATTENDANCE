<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class CSVImportController extends Controller
{
    public function showImportPage()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);
    
        ini_set('max_execution_time', 600);
        $path = $request->file('file')->getRealPath();
        $content = file_get_contents($path);
        $content = mb_convert_encoding($content, 'UTF-8', 'UTF-8');
    
        file_put_contents($path, $content);
    
        Excel::import(new UsersImport, $request->file('file'));
    
        $request->session()->flash('success', 'CSV data imported successfully.');
        $request->session()->flash('show_modal', true);
    
        return redirect()->route('import.csv')->with('success', 'CSV imported successfully!');
    }
    
}
