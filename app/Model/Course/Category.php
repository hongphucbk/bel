<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'course_category';

    public function course_info()
    {
    	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    }

}
