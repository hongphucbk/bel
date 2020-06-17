<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    protected $table = 'wh_warehouse_item';

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

    public function warehouse()
    {
    	return $this->belongsTo('App\Model\Warehouse\Warehouse','warehouse_id','id');
    }

    public function item()
    {
    	return $this->belongsTo('App\Model\Warehouse\Item','item_id','id');
    }

}
