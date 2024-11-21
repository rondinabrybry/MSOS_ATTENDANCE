<?php
namespace App\Models;

use App\Notifications\NewResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new NewResetPasswordNotification($token));
    }

    protected $fillable = [
        'usertype',
        'name',
        'email',
        'course',
        'section',
        'section1',
        'time_preference',
        'student_id',
        'rf_id',
        'password',
        'user_id',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function settings()
    {
        return $this->hasOne(Setting::class);
    }

    public function timein()
    {
        return $this->hasOne(enable_login::class);
    }

    public function enabled_logins()
    {
        return $this->hasOne(enable_login::class);
    }
    
        protected static function boot()
        {
            parent::boot();
    
            static::created(function ($user) {
                $user->settings()->create([]);
            });
        }
        
        /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->usertype === 'admin' || $this->usertype === 'superadmin';
    }
    
    public function canLogout()
    {
        $attendances = $this->attendances;
        $canLogout = true;

        foreach ($attendances as $attendance) {
            if ($attendance->logged_in_at && $attendance->logged_out_at) {
                $canLogout = false;
                break;
            }
        }

        return optional($this->settings)->is_logged_in && $canLogout;
    }
}
