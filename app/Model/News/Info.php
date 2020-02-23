<?php

namespace App\Model\News;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
  protected $table = 'news_info';

  protected $fillable = ['name', 'user_id', 'description', 'rate', 'note', 'category_id'];

  public function user()
  {
  	return $this->belongsTo('App\Model\User\User','user_id','id');
  }

  public function news_category()
  {
  	return $this->belongsTo('App\Model\News\Category','category_id','id');
  }
}
