<?php

namespace App\Model\Soft;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
	  protected $table = 'soft_attach';

	  protected $fillable = ['info_id', 'user_id', 'name', 'description', 'link', 'link_qc', 'note'];	

	  public function soft_info()
	  {
	  	return $this->belongsTo('App\Model\Soft\Info','info_id','id');
	  }
}
