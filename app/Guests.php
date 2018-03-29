<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Scopes\AuthorizedScope;

class Guests extends Authenticatable
{
    //use Notifiable;
    protected $table = 'guests';
    //protected $guard = 'guests'; 

    public function getAuthPassword()
    {
            return $this->guest_password;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guest_title', 'guest_firstname', 'guest_lastname', 'guest_email', 'guest_password', 'guest_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'guest_password', 'remember_token',
    ];
}
