<?php

namespace App\Model\Soft;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
  protected $table = 'soft_info';

  protected $fillable = ['name', 'user_id', 'description', 'rate', 'note'];

  public function user()
  {
  	return $this->belongsTo('App\Model\User\User','user_id','id');
  }
}
