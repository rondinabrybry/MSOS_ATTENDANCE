<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class LogoutrAtt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logged_out_at',
    ];

    public function setLoggedOutAtAttribute($value)
    {
        $utcPlus8Time = Carbon::parse($value)->setTimezone('Asia/Manila');
        $this->attributes['logged_out_at'] = $utcPlus8Time->toDateTimeString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

