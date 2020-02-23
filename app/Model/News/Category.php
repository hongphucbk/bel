<?php

namespace App\Model\News;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'news_category';

    public function news_info()
    {
    	return $this->hasMany('App\Model\News\Info','category_id','id');
    }

}
