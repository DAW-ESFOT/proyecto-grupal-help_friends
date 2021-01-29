<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\This;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
//            'commentary' => $this->commentary,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'user_id' => $this->user_id,
            //'user_id_pub' => $this->user_id_pub,
            //'subCategory_id' => $this->subCategory_id,
           // 'image' => $this->image,

            //Rutas con links

            'user_publicacion' => "/api/users/".$this->user_id,
            //'user_publicacion' => "/api/articles/".$this->user_id_pub,
            'subCategory_id' => "/api/subCategory_id/".$this->subCategory_id,
            'images' => $this->image,



        ];
    }
}
