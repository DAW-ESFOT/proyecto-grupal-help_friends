<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [ 'name','description','commentary'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function comentary() {
        return $this->hasMany('App\Comentary');
    }

    public function subCategory(){
        return $this->belongsTo('App\SubCategory');
    }

    //public function images() {
        //return $this->hasMany('App\Image');
   // }
}
