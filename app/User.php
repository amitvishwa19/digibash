<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;

    use LogsActivity;
    use CausesActivity;
    protected static $logUnguarded = true;

    protected $fillable = [
        'firstname','lastname', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Page');
    }

    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function student_profile()
    {
        return $this->belongsTo('App\Student');
    }

    public function teacher_profile()
    {
        return $this->belongsTo('App\Teacher');
    }


    public function routeNotificationForSlack($notification)
    {
        return config('app.slack_webhook');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
