<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $connection='mysql2';
    protected $table= 'movement';
    public function stop(){
      return $this->hasMany('App\Stop');
    }

}
