<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'wh_warehouse';

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

    public function facility()
    {
    	return $this->belongsTo('App\Model\Warehouse\Facility','facility_id','id');
    }

}
