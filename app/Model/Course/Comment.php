<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'course_comment';

    public function course_lesson()
    {
    	return $this->belongsTo('App\Model\Course\Lesson','course_lesson_id','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }
}
