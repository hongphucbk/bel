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
}
