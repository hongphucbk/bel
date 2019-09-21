<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'course_content';

    public function course_lesson()
    {
    	return $this->belongsTo('App\Model\Course\Lesson','course_lesson_id','id');
    }
}
