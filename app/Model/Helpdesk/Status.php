<?php

namespace App\Model\Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'helpdesk_status';

    // public function helpdesk_tickets()
    // {
    // 	return $this->hasMany('App\Model\Helpdesk\Ticket','category_id','id');
    // }

}
