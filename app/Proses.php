<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
	protected $guarded = ['id'];
    // public function user()
    // {
    // 	return $this->belongsTo('App\User');
    // }
     public function Pesanans()
    {
    	return $this->belongsToMany('App\Pesanan');
    }
}
