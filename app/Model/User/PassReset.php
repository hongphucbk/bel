<?php

namespace App\Model\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PassReset extends Authenticatable
{
    use Notifiable;

    protected $table = 'password_resets';
    
    protected $primaryKey = 'created_at';
    
}
