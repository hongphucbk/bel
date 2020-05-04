<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    protected $table = 'course_content_type';

    public function user()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }

    // public function course_content()
    // {
    // 	return $this->hasMany('App\Model\Course\Content','course_category_id','id');
    // }

}
