<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($comentary) {
            $comentary->user_id = Auth::id();
           
        });
    }
    protected $fillable = ['description'];
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function article() {
        return $this->belongsTo('App\Article');
    }
}
