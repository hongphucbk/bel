<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
	  protected $table = 'product_attach';

	  public function product_info()
	  {
	  	return $this->belongsTo('App\Model\Product\Info','product_info_id','id');
	  }
}
