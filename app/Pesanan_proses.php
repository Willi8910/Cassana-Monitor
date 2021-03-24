<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan_proses extends Model
{
    public function Pesanan()
    {
		return $this->belongsTo('App\Pesanan');
    }

     public function Proses()
    {
    	return $this->belongsTo('App\Proses');
    }
}
