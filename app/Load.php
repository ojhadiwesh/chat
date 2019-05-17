<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
  protected $connection = 'mysql2';
  protected $table= 'loads';
  
  public $primary_key = 'id';
  public $timestamp= true;
}
