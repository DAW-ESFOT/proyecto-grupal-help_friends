<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{

//    public static function boot()
//    {
//        parent::boot();
//        static::creating(function ($image) {
//            $image->user_id = Auth::id();
//            $image->article_id = Auth::id();
//        });
//    }
    protected $fillable = [ 'image'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($comentary) {
            $comentary->user_id = Auth::id();

        });
    }


    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}

