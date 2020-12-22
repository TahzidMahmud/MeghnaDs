<?php

namespace App;

use App\Member;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'user_role',
    ];

    public function member()
    {
    	return $this->hasOnes(Member::class);
    }

    public function notice()
    {
    	return $this->hasMany(Notice::class);
    }

}
