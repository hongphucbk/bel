<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'course_info';

    public function course_category()
    {
    	return $this->belongsTo('App\Model\Course\Category','course_category_id','id');
    }
}
