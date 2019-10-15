<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
	  protected $table = 'product_detail';

	  public function product_info()
	  {
	  	return $this->belongsTo('App\Model\Product\Info','product_info_id','id');
	  }
}
