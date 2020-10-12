<?php

namespace App\Model\Doc;

use Illuminate\Database\Eloquent\Model;

class Infor extends Model
{
  protected $table = 'doc_infor';

  public function user()
  {
  	return $this->belongsTo('App\Model\User\User','user_id','id');
  }

  public function status()
  {
  	return $this->belongsTo('App\Model\Doc\Status','status_id','id');
  }

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

}
