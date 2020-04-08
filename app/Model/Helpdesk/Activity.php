<?php

namespace App\Model\Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'helpdesk_activity';

    // public function helpdesk_tickets()
    // {
    // 	return $this->hasMany('App\Model\Helpdesk\Ticket','category_id','id');
    // }

    public function user()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }

    public function ticket()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }
    
    public function status()
    {
    	return $this->belongsTo('App\Model\Helpdesk\Status','status_id','id');
    }

}
