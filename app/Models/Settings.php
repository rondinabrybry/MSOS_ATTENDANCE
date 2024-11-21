<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'id',
        'is_logged_in',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function index()
{
    $setting = Setting::firstOrCreate([], ['is_logged_in' => false]);
    return view('admin.index', ['setting' => $setting]);
}
}