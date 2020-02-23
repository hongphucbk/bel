<?php

namespace App\Model\News;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	  protected $table = 'news_content';

	  protected $fillable = ['info_id', 'user_id', 'title', 'content', 'priority', 'note'];
	  
	  public function news_info()
	  {
	  	return $this->belongsTo('App\Model\News\Info','info_id','id');
	  }
}
