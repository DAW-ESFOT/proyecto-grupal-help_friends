<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentary extends Model
{
    protected $fillable = ['description'];
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function articles() {
        return $this->belongsTo('App\Articles');
    }
}
