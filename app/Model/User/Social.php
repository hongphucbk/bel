<?php

namespace App\Model\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Social extends Authenticatable
{
    use Notifiable;

    protected $table = 'social_users';

    public function user()
	  {
	  	return $this->belongsTo('App\Model\User\User','user_id','id');
	  }

}
