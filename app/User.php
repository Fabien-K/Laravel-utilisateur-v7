<?php

namespace App;

use App\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Auth\MustVerifyEmailImproved;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use MustVerifyEmailImproved;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    /**
     * verifie si l'utilisateur est admin
     */

    public function isAdmin()
    {
        if($this->is_admin == true)
        {
            return true;
        }
        return false;
    }
    /**
     * verifie si l utilisateur a confirmé son mail
     */
    public function mailIsConfirmed()
    {
        if(! is_null($this->email_verified_at))
        {
            return true;
        } else 
        {
            return false;
        }
    }
    public function isApproved()
    {
        if( is_null($this->approved_at))
        {
            return false;
        } else
        {
            return true;
        }
    }
    public function isRefused()
    {
        if( is_null($this->deleted_at))
        {
            return false;
        } else
        {
            return true;
        }
    }

    public function isBanned()
    {
        if(! is_null($this->banned_at))
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function isNotBanned()
    {
        if(is_null($this->banned_at))
        {
            return true;
        } else
        {
            return false;
        }
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
