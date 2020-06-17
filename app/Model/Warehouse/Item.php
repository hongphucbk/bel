<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'wh_item';

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

    public function category()
    {
    	return $this->belongsTo('App\Model\Warehouse\Category','category_id','id');
    }

}
