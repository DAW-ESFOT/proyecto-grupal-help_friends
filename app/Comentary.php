<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comentary extends Model
{
    protected $fillable = ['description'];

    public static function boot(){
        parent::boot();
        static::creating(function ( $comentary) {
            $comentary->user_id = Auth::id();
            $comentary->article_id = Auth::id();
        });
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function articles() {
        return $this->belongsTo('App\Articles');
    }
}
