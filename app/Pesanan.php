<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded = ['id'];
    public function Prosesess()
    {
    	return $this->belongsTo('App\Proses','proses_id');
    }

   public function Proses()
   {
   		return $this->belongsToMany('App\Proses')->withPivot('progress');
   }

}
