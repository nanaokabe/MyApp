<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  
  // 割り当て許可
    protected $fillable = [
        'id',
        'user_id',
    ];
  
  
    public function user()
  {
    return $this->belongsTo('App\User');
  }


    public function post()
  {
    return $this->belongsTo('App\Post');
  }
   
   
  public function trouble()
  {
    return $this->belongsTo('App\Trouble');
  } 
  
  
}
