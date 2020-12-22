<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded=[];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function cash_in()
    {
    	return $this->hasMany(CashIn::class);
    }

    public function cash_out()
    {
    	return $this->hasMany(CashOut::class);
    }
}
