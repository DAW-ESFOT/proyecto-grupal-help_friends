<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = ['name', 'description', 'commentary','subCategory_id'];

    //public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = Auth::id();
                  });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
    public function image(){
        return $this->hasMany('App\Image');
    }

}
