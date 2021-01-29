<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name','image'];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}

