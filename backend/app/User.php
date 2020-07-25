<?php

namespace App;

use App\Role;
use App\Notifications\VerifyApiEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


//class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    //protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [
            'email' => $this->email,
            'name' => $this->name
        ];
    }

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    
    

    /*public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
    }*/

    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, 'Acción no autorizada');
    }

    public function hasAnyRole($roles){
        if (is_array($roles)){
            foreach ($roles as $role) {
                if ($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if ($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('nombre', $role)->first()){
            return true;
        }

        return false;
    }
    
    public function sendApiEmailVerificationNotification()
    {
        $this->notify(new VerifyApiEmail);
        //parent::sendEmailVerificationNotification();
    }

    //Mutadores

/*     public function setPasswordAttribute($attribute){
        $this->attributes['password'] = bcrypt($attribute);
        $url = str_replace(‘ ‘, '-', $this->attributes['name']);
        if (static::where('url', $url)->exists()){
            $tempo = static::latest()->where('url')->first();
            $url = "{$url}-".++$tempo->id;
        }
        $this->attributes['url'] = strtolower($url);
    } */


}
