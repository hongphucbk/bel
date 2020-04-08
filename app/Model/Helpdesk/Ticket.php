<?php

namespace App\Model\Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'helpdesk_ticket';

    // public function helpdesk_tickets()
    // {
    // 	return $this->hasMany('App\Model\Helpdesk\Ticket','category_id','id');
    // }

    public function user()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }

    public function assign()
    {
    	return $this->belongsTo('App\Model\User\User','assign_id','id');
    }

    public function status()
    {
    	return $this->belongsTo('App\Model\Helpdesk','status_id','id');
    }

}
