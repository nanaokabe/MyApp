<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Good;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nickname', 'email', 'password', 'frametype', 'colortype', 'hobby', 'image_path', 'likebrand',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function troubles() {
        return $this->hasMany('App\Trouble');
    }
    
    public function comments() {
        return $this->hasMany('App\Comment');
    }
    
    
    public function posts()
    {
        return $this->hasMany('App\Post'); 
    }
    
    public function favorites()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    
    public function isGood($post_id)
    {
        $good = Good::where('user_id', $this->id)->where('post_id', $post_id)->first();
        return $good != null; 
    }
    
    /*私が持ってるuser_id       1番最初のやつだけ取ってくる(一個しかないけど)
    goodテーブルから自分のidを探して→$goodに入れる。
    goodテーブルにidが入ってなかったら
        $good = Good::where('user_id', $this->user_id)->where('post_id', $post_id)->first();
        return $good != null; 
        nut(ナット）=!　goodがnullじゃなかったらいいねしてるってこと。
        goodテーブルの中にこのユーザー私がこのポストに対していいねをしたデータがあったらいいねをしてます。
        ってことは、is goodはtrueになる。*/
        

}
