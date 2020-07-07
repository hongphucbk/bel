<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table = 'wh_supplier';

  public function user()
  {
  	return $this->belongsTo('App\Model\User\User','user_id','id');
  }

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

}
