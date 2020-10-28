<?php

namespace App\Model\Doc;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $table = 'doc_approval';

    public function user()
    {
        return $this->belongsTo('App\Model\User\User','user_id','id');
    }

    public function approval()
    {
        return $this->belongsTo('App\Model\User\User','approval_id','id');
    }

    public function approved()
    {
        return $this->belongsTo('App\Model\User\User','approved_id','id');
    }

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

    // public function warehouse()
    // {
    // 	return $this->belongsTo('App\Model\Warehouse\Warehouse','warehouse_id','id');
    // }

    // public function item()
    // {
    // 	return $this->belongsTo('App\Model\Warehouse\Item','item_id','id');
    // }

}
