<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
  protected $connection='mysql2';
  protected $table= 'stops';
  public function movement(){
    return $this->belongsTo('App\Movement');
  }
  
}
