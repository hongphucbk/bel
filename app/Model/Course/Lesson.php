<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'course_lesson';

    public function course_info()
    {
    	return $this->belongsTo('App\Model\Course\Info','course_info_id','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }
}
