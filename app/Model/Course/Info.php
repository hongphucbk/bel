<?php

namespace App\Model\Course;

use Illuminate\Database\Eloquent\Model;
use App\Model\Course\Category;

class Info extends Model
{
    protected $table = 'course_info';

    public function course_category()
    {
    	return $this->belongsTo('Category','course_category_id','id');
    }
}
