<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_category'];


    public function subcategory(){
        return $this->hasMany('App\Category');}

    
}
