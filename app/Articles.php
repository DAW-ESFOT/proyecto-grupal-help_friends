<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Articles extends Model
{
    protected $fillable = ['name', 'description', 'commentary','subCategory_id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = Auth::id();
            $article->user_id_pub = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comentary()
    {
        return $this->hasMany('App\Comentary');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
}
