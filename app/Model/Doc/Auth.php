<?php

namespace App\Model\Doc;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'doc_role_user';

    // public function course_info()
    // {
    // 	return $this->hasMany('App\Model\Course\Info','course_category_id','id');
    // }

    public function user()
    {
    	return $this->belongsTo('App\Model\User\User','user_id','id');
    }

    public function role()
    {
    	return $this->belongsTo('App\Model\Doc\Role','role_id','id');
    }

}
