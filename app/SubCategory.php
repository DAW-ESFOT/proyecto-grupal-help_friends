<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name_subcategory'];

    public function articles(){
        return $this->hasMany('App\Article');
    }
}
