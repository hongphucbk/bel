<?php

namespace App\Model\Soft;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	  protected $table = 'soft_content';

	  protected $fillable = ['info_id', 'user_id', 'title', 'content', 'priority', 'note'];
	  
	  public function soft_info()
	  {
	  	return $this->belongsTo('App\Model\Soft\Info','info_id','id');
	  }
}
