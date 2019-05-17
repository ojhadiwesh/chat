<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
      'user_id', 'friend_id','chat'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
