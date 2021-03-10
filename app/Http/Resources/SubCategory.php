<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;

class SubCategory extends JsonResource
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
           //'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at,
            //'category_id' => $this->id,

           //'articles' => ArticleResource::collection($this->articles),
        ];
    }
}
