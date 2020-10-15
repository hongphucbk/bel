<?php

namespace App\Model\Doc;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
  protected $table = 'doc_attach';

  public function user()
  {
  	return $this->belongsTo('App\Model\User\User','user_id','id');
  }

  public function infor()
  {
  	return $this->belongsTo('App\Model\Doc\Infor','infor_id','id');
  }

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

}
