<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

    public function sendPasswordResetNotification($token)
     {
         $this->notify(new AdminPasswordResetNotification($token));
     }

        protected $guard = 'admin';



        protected $fillable = [
            'name', 'email', 'password','phone'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
